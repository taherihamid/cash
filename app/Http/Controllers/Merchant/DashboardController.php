<?php

namespace App\Http\Controllers\Merchant;


use App\Classes\Response;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Menu;
use App\MenuItems;
use App\Merchant;
use App\MerchantCash;
use App\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Self_;


class DashboardController extends Controller
{
    protected $guard = 'merchant';
    const WALLET_ERROR = 650;
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    public function index()
    {

        $invoices = Invoice::with('agents')->get();

//        $merchant = Merchant::find(Auth::guard('merchant')->user()->id);
//        dd($invoices);
        return view('merchant_dashboard.index', compact('invoices'));
    }
    public function merchantIndexFilter(Request $request)
    {

        $validator = Validator::make($request->all(), ['status' => ['required']]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }

        $invoices = Invoice::with('agents')->where('order_status',$request->input('status'))->get();

        if ($invoices) {
            return Response::json('messages.success', $invoices, self::HTTP_OK);
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }
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

        $invoice = Invoice::where('invoice_no', $request->input('invoice_no'))->first();

        if ($invoice) {

            return view('agent_dashboard.agent.detail', compact('invoice'));
        } else {
            alert()->error('Please Insert Valid Invoice Number', 'Invalid Data')
                ->persistent('ok');

            return redirect()->back();
        }
    }

    public function getInvoiceAmount(Request $request)
    {

        Validator::make($request->all(), [
            'invoice_no' => 'required',

        ])->validate();

        $invoice = Invoice::where('invoice_no', $request->input('invoice_no'))->first();

        $invoice->order_status = Invoice::Amount_Received;
        $invoice->agent_id = $request->input('agent_id');

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

    public function cashOut()
    {

        $merchant = Merchant::where('id', auth()->guard('merchant')->user()->id)->first();
        return view('merchant_dashboard.cash_out', compact('merchant'));
    }

    public function addMerchantCashRequest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'merchant_id' => ['required'],
            'requested_amount' => ['required'],

        ]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }

        $merchant = Merchant::where('id', $request->merchant_id)->first();
        if ($merchant ) {

            if($merchant->total_balance >= $request->requested_amount){
                $cash_request = MerchantCash::create([
                    'requested_amount' => $request->requested_amount,
                    'status' => MerchantCash::IN_PROGRESS,
                    'merchant_id' => $merchant->id,

                ]);
                $merchant->total_balance = ($merchant->total_balance - $request->requested_amount);
                if ($cash_request->save() && $merchant->save()) {

                    return Response::json('messages.success', $cash_request, self::HTTP_OK);
                } else {
                    return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
                }
            }else{
                $data = [
                    'code' => self::WALLET_ERROR,
                    'message'    => null,

                ];
                return Response::json('messages.unknown_error', $data,self::HTTP_OK );
            }


        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }

    }

}
