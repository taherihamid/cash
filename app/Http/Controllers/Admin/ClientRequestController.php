<?php

namespace App\Http\Controllers\Admin;


use App\Agent;

use App\AgentCash;
use App\AgentTop;
use App\Classes\Response;
use App\Invoice;

use App\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use function MongoDB\BSON\toPHP;

class clientRequestController extends Controller
{
//    protected $guard = 'admin';

    public function topUp()
    {

        return view('admin_dashboard.top_up.index');
    }
    public function settlement()
    {
        $sett_requests = AgentCash::with('agent')->get();
        return view('admin_dashboard.settlement.index',compact('sett_requests'));
    }

    public function topRequestList()
    {
        $top_requests = AgentTop::with('agent')->where('status', '=', '0')->get();


        if ($top_requests) {

            return Response::json('messages.success', $top_requests, self::HTTP_OK);
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }

    }
    public function fetchAgentSett()
    {
        $sett_requests = AgentCash::with('agent')->get();


        if ($sett_requests) {

            return Response::json('messages.success', $sett_requests, self::HTTP_OK);
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }

    }

    public function updateTopRequestStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'top_id' => 'required',
            'status' => 'required',

        ]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }

        $top_request = AgentTop::find($request->input('top_id'));
        if ($top_request) {

            if ($request->input('status') == 1) {
                $agent = Agent::where('id', $top_request->agent_id)->first();
                $agent->credit_limit += $top_request->requested_amount;
                $agent->available_credit += $top_request->requested_amount;
                $agent->save();
            }

            $top_request->status = $request->input('status');

            if ($top_request->save()) {
                return Response::json('messages.success', $top_request, self::HTTP_OK);
            } else {
                return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
            }
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }


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

}
