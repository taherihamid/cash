<?php

namespace App\Http\Controllers\Admin;


use App\Agent;

use App\Classes\Response;
use App\Invoice;

use App\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PartnerRequestController extends Controller
{
//    protected $guard = 'admin';

    public function index()
    {


//        dd($invoices);
        return view('admin_dashboard.partnership.index');
    }
    public function partnerRequestList()
    {

        $agents = Agent::all();

        $merchants = Merchant::all();

        $clients = $agents->concat($merchants);

        if ($clients) {

            return Response::json('messages.success', $clients, self::HTTP_OK);
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }

    }

    public function updateClientStatus(Request $request)
    {
        Validator::make($request->all(), [
            'client_id' => 'required',
            'partner_type' => 'required',
            'status' => 'required',

        ])->validate();

        $client = null;
        switch($request->partner_type) {
            case(0):

               $client = Agent::find($request->client_id);
                break;

            case(1):
                $client = Merchant::find($request->client_id);
                break;

            default:
                $msg = 'Something went wrong.';
        }


        $client->status = $request->status;

        if ($client->save()) {
            return Response::json('messages.success', $client, self::HTTP_OK);
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }

    }
    public function AjaxFilterCourseSelectionResult(Request $request){

        $this->validate($request, [
            'title' => 'nullable',
            'search' => 'nullable',
            'year' => 'required|digits:4|integer|min:'. (jdate(date('Y-m-d'))->format('Y')-5) .'|max:'. (jdate(date('Y-m-d'))->format('Y')+5),
        ]);

        return $request->all();

    }

}
