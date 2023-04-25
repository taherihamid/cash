<?php

namespace App\Http\Controllers\Agent;


use App\Agent;
use App\AgentCash;
use App\AgentTop;
use App\Classes\Response;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Menu;
use Auth;
use App\MenuItems;
use App\Merchant;
use App\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class DashboardController extends Controller
{
    const WALLET_ERROR = 650;

    public function __construct()
    {
//        $this->middleware('auth:admin');
    }

    public function index()
    {
        $invoices = Invoice::with('merchants')
            ->Where('order_status', '<>', Invoice::Pending_Cash_Payment)
            ->Where('agent_id',  Auth::guard('agent')->user()->id)
            ->get();
//        dd($invoices);
        return view('agent_dashboard.index', compact('invoices'));
    }


    public function search()
    {
        $collection = DB::table('tender_table_tender as tender')->
        join('tender_table_tender_calling_document as calling', 'calling.TenderIDRef', '=', 'tender.TenderID')->
        join('tender_table_tender_calling_document_attachment as attachment',
            'attachment.TenderCallingDocumentIDRef', '=', 'calling.TenderCallingDocumentID')->
        join('obs_table_person as person',
            'person.PersonID', '=', 'tender.companyIDRef')->
        select('*');

        if (request()->TenderCallingDocumentID) {
            $collection->where('TenderCallingDocumentID', \request()->TenderCallingDocumentID);
        }
        if (\request()->subject) {
            $collection->where('subject', \request()->subject);
        }
        if (\request()->companyIDRef) {
            $collection->where('PersonTitle', 'like', '%' . \request()->companyIDRef . '%');
        }
        if (\request()->tenderType) {
            $collection->where('tenderType', \request()->tenderType);
        }
        if (\request()->WorkflowContractExecutionTypeIDRef) {
            $collection->where('WorkflowContractExecutionTypeIDRef', \request()->WorkflowContractExecutionTypeIDRef);
        }
        if (\request()->techSpecReqVolume) {
            $collection->where('techSpec', 'like', '%' . \request()->techSpecReqVolume . '%')->orWhere('ReqVolume', 'like', '%' . \request()->techSpecReqVolume . '%');
        }

        $collection = $collection->get();

//        dd($collection);

        return view('agent.' . $this->admin_view . '.index', compact('collection'));
    }

    public function getInvoiceDetail(Request $request)
    {

        Validator::make($request->all(), [
            'invoice_no' => 'required',

        ])->validate();

        $invoices = Invoice::with('merchants')->Where('order_status', '<>', Invoice::Pending_Cash_Payment)->get();

        $invoice = Invoice::where('invoice_no', $request->input('invoice_no'))->where('order_status', '<>', '1')->first();

        $agent_commission_type = Auth::guard('agent')->user()->commission_type;
        $agent_commission = null;
        if($agent_commission_type == Agent::PERCENT_TYPE){
            $agent_commission = ($invoice->amount_to_pay * Auth::guard('agent')->user()->commission)/100;
        }else{
            $agent_commission =  Auth::guard('agent')->user()->commission;
        }

        if ($invoice) {

            return view('agent_dashboard.invoice.detail',
                compact('invoice', 'invoices','agent_commission'));
        } else {
            alert()->error('This Invoice has already been paid', 'Invalid Data')
                ->persistent('ok');

            return redirect()->back();
        }
    }

    public function getInvoiceAmount(Request $request)
    {
//        dd($request);
        Validator::make($request->all(), [
            'invoice_no' => 'required',

        ])->validate();

        $invoice = Invoice::where('invoice_no', $request->input('invoice_no'))->first();

        $invoice->order_status = Invoice::Amount_Received;
        $invoice->agent_id = $request->input('agent_id');
        $agent = Agent::find($request->input('agent_id'));
        $merchant = Merchant::find($invoice->merchant_id);


        $agent_commission_type = Auth::guard('agent')->user()->commission_type;
        $agent_commission = null;
        if($agent_commission_type == Agent::PERCENT_TYPE){
            $agent_commission = ($invoice->amount_to_pay * Auth::guard('agent')->user()->commission)/100;
        }else{
            $agent_commission =  Auth::guard('agent')->user()->commission;
        }


        $commission = $agent_commission;

        if ($invoice->amount_to_pay <= $agent->remaining_credit) {

            $agent->remaining_credit = $agent->remaining_credit- $invoice->amount_to_pay;
            $agent->wallet += $commission;
            $invoice->agent_commission += $commission;

            $merchant->total_balance += $invoice->amount_to_pay ;

            if ($agent->save() && $merchant->save()) {

                if ($invoice->save()) {

                    alert()->success('', 'Your Payment Registered Successfully')
                        ->persistent('ok');
                    return redirect()->route('agent.dashboard');
                } else {
                    alert()->error('Please Insert Valid Invoice Number', 'Invalid Data')
                        ->persistent('ok');

                    return redirect()->back();
                }
            }
        } else {
            alert()->error('Your request exceeds the Credit limit', 'Invalid Data')
                ->persistent('ok');
            return redirect()->back();
        }


    }

    public function cashOut()
    {

        $agent = Agent::where('id', auth()->guard('agent')->user()->id)->first();
        return view('agent_dashboard.cash_out', compact('agent'));
    }

    public function addAgentCashRequest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'agent_id' => ['required'],
            'requested_amount' => ['required'],

        ]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }

        $agent = Agent::where('id', $request->agent_id)->first();
        if ($agent) {

            if ($agent->wallet >= $request->requested_amount) {
                $cash_request = AgentCash::create([
                    'requested_amount' => $request->requested_amount,
                    'status' => AgentCash::IN_PROGRESS,
                    'agent_id' => $agent->id,

                ]);
                $agent->wallet = ($agent->wallet - $request->requested_amount);

                if ($cash_request->save() && $agent->save()) {

                    return Response::json('messages.success', $cash_request, self::HTTP_OK);
                } else {
                    return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
                }
            } else {
                $data = [
                    'code' => self::WALLET_ERROR,
                    'message' => null,

                ];
                return Response::json('messages.unknown_error', $data, self::HTTP_OK);
            }


        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }

    }

    public function topUp()
    {

        $agent = Agent::where('id', auth()->guard('agent')->user()->id)->first();
        return view('agent_dashboard.top_up', compact('agent'));
    }

    public function addAgentTopRequest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'agent_id' => ['required'],
            'requested_amount' => ['required'],
            'tracking_number' => ['required'],

        ]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }

        $agent = Agent::where('id', $request->agent_id)->first();
        if ($agent) {

            $top_request = AgentTop::create([
                'requested_amount' => $request->requested_amount,
                'tracking_number' => $request->tracking_number,
                'status' => AgentTop::IN_PROGRESS,
                'agent_id' => $agent->id,

            ]);


            if ($top_request->save()) {

                return Response::json('messages.success', $top_request, self::HTTP_OK);
            } else {
                return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
            }


        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }

    }
}
