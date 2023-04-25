<?php

namespace App\Http\Controllers\Admin;


use App\Agent;

use App\AgentCash;
use App\Classes\Response;
use App\Events\Registered;
use App\Invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AgentController extends Controller
{
//    protected $guard = 'admin';

    public function index()
    {

        $agents = DB::table('agents')
            ->join('invoices', 'invoices.agent_id', 'agents.id')
            ->select("*", DB::raw('COUNT(invoices.id) as transaction'),
                DB::Raw('SUM(invoices.agent_commission) as comm'),
                DB::Raw('SUM(invoices.amount_to_pay) as am'))
            ->groupBy("invoices.agent_id")
            ->where('invoices.order_status', true)
            ->get();
//        dd($agents);
//        $agents = Agent::all();


        return view('admin_dashboard.agent.index', compact('agents'));
    }

    public function create()
    {
        return view('admin_dashboard.agent.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255',
            'phone' => 'required',
            'business' => 'required|max:255',
            'business_detail' => 'required',
            'credit_limit' => 'required',
            'IBAN' => 'required',
            'commission' => 'required',
            'commission_type' => 'required',
            'email' => 'required|email|max:255|unique:agents',

        ]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }
        $new_agent = Agent::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'business' => $request->business,
            'business_detail' => $request->business_detail,
            'credit_limit' => $request->credit_limit,
            'IBAN' => $request->IBAN,
            'commission' => $request->commission,
            'commission_type' => $request->commission_type,
            'email' => $request->email,
        ]);


        if ($new_agent) {
            $new_agent->status = Agent::APPROVED_STATUS;
            $pass_key = Str::random(8);
            $personal_id = rand(1000000000, 9999999999);

            $new_agent->password = bcrypt($pass_key);
            $new_agent->personal_id = $personal_id;
            if ($new_agent->save()) {

                event(new Registered($new_agent->email, $personal_id, $pass_key));
                alert()->success('Personal ID Is : ' . $personal_id . ' ' . 'Password  Is : ' . $pass_key, 'agent Created Successfully')
                    ->persistent('ok');

            } else {
                alert()->error('Please Insert Valid Data', 'Invalid Data')
                    ->persistent('ok');
            }
        } else {
            alert()->error('Please Try Later', 'Unknown Error');
            return redirect()->back();
        }

        return redirect()->route('admin.agent.index');


    }

    public function AjaxFilterCourseSelectionResult(Request $request)
    {

        $this->validate($request, [
            'title' => 'nullable',
            'search' => 'nullable',
            'year' => 'required|digits:4|integer|min:' . (jdate(date('Y-m-d'))->format('Y') - 5) . '|max:' . (jdate(date('Y-m-d'))->format('Y') + 5),
        ]);

        return $request->all();

    }

    public function updateAgentInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'client_id' => ['required'],
            'IBAN' => ['required'],
            'commission' => ['required'],
            'commission_type' => ['required'],

        ]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }
        $agent = Agent::where('id', $request->client_id)->first();
        $agent->IBAN = $request->IBAN;
        $agent->commission = $request->commission;
        $agent->commission_type = $request->commission_type;
        $agent->status = Agent::APPROVED_STATUS;

        $pass_key = Str::random(8);
        $personal_id = rand(1000000000, 9999999999);

        $agent->password = bcrypt($pass_key);
        $agent->personal_id = $personal_id;


        if ($agent->save()) {

            $agent['pass_key'] = $pass_key;
            return Response::json('messages.success', $agent, self::HTTP_OK);
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }
    }


    public function sentAgentEmail(Request $request)
    {

        $validator = Validator::make($request->all(), ['body' => ['required']]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }


        $agent = Agent::where('id', $request->body['id'])->first();

        if (event(new Registered($agent->email, $agent->personal_id, $request->body['pass_key']))) {


            return Response::json('messages.success', $agent, self::HTTP_OK);
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }
    }

    public function updateSettlementRequest(Request $request)
    {

        $validator = Validator::make($request->all(), ['cash_id' => ['required']]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }


        $agent_request = AgentCash::where('id', $request->input('cash_id'))->first();

        if ($agent_request) {
            $agent = Agent::find($agent_request->agent_id);
            $agent->cash_out = $agent_request->requested_amount;
            $agent_request->status = AgentCash::PAID;
            if ($agent_request->save() && $agent->save()) {
                return Response::json('messages.success', $agent_request, self::HTTP_OK);
            } else {
                return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
            }


        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }
    }

    public function filter()
    {
        $agents = DB::table('agents')
            ->join('invoices', 'invoices.agent_id', 'agents.id')
            ->select("*", DB::raw('COUNT(invoices.id) as transaction'),
                DB::Raw('SUM(invoices.agent_commission) as comm'),
                DB::Raw('SUM(invoices.amount_to_pay) as am'))
            ->groupBy("invoices.agent_id");

        if (request()->transaction_from && request()->transaction_to) {
            $agents->having('transaction', '>=', request()->transaction_from);
            $agents->having('transaction', '<=', request()->transaction_to);
        }
        if (isset(request()->transaction_from) && !isset(request()->transaction_to)) {
            $agents->having('transaction', '>=', request()->transaction_from);
        }
        if (isset(request()->transaction_to) && !isset(request()->transaction_from)) {
            $agents->having('transaction', '<=', request()->transaction_to);
        }
        if (request()->commission_from && request()->commission_to) {
            $agents->having('comm', '>=', request()->commission_from);
            $agents->having('comm', '<=', request()->commission_to);
        }
        if (isset(request()->commission_from) && !isset(request()->commission_to)) {
            $agents->having('comm', '>=', request()->commission_from);
        }
        if (isset(request()->commission_to) && !isset(request()->commission_from)) {
            $agents->having('comm', '<=', request()->commission_to);
        }
        if (request()->amount_from && request()->amount_to) {
            $agents->having('am', '>=', request()->amount_from);
            $agents->having('am', '<=', request()->amount_to);
        }
        if (isset(request()->amount_from) && !isset(request()->amount_to)) {
            $agents->having('am', '>=', request()->amount_from);
        }
        if (isset(request()->amount_to) && !isset(request()->amount_from)) {
            $agents->having('am', '<=', request()->amount_to);
        }
        if (request()->cash_outed_from && request()->cash_outed_to) {
            $agents->having('am', '>=', request()->cash_outed_from);
            $agents->having('am', '<=', request()->cash_outed_to);
        }
        if (isset(request()->cash_outed_from) && !isset(request()->cash_outed_to)) {
            $agents->having('am', '>=', request()->cash_outed_from);
        }
        if (isset(request()->cash_outed_to) && !isset(request()->cash_outed_from)) {
            $agents->having('am', '<=', request()->cash_outed_to);
        }
        $agents->where('invoices.order_status', true);
        $agents = $agents->get();
        return view('admin_dashboard.agent.index', compact('agents'));
    }

    public function updateAvailableCredit()
    {
        $agents = Agent::where('activity_status', 1)->get();
        foreach ($agents as $agent) {
            $agent->available_credit = $agent->credit_limit;
            $agent->save();
        }
    }
}
