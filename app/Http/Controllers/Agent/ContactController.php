<?php

namespace App\Http\Controllers\Agent;


use App\Agent;
use App\AgentContact;
use App\Classes\Response;
use App\Http\Controllers\Controller;
use App\Invoice;
 use Auth;
use App\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Self_;


class ContactController extends Controller
{
    protected $guard = 'agent';


    public function index()
    {

        $agent = Agent::find(Auth::guard('agent')->user()->id);

        return view('agent_dashboard.contact_support.index', compact('agent'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'agent_id' => 'required',
            'body' => 'required',

        ]);
        if ($validator->fails()) {
            alert()->error('Please Insert Valid Data', 'Invalid Data')
                ->persistent('ok');
        }


        $agent = Agent::where('id', $request->input('agent_id'))->first();

        if($agent){
            $agent_request = AgentContact::create([
                'body' => $request->input('body'),
                'status' => AgentContact::IN_PROGRESS,
                'agent_id' => $agent->id,

            ]);
            if($agent_request->save()){

                alert()->success('', 'Your Request Registered Successfully')
                    ->persistent('ok');
            }else{
                alert()->error('Please Insert Valid Invoice Number', 'Invalid Data')
                    ->persistent('ok');
            }

        }else{
            alert()->error('Please Insert Valid Invoice Number', 'Invalid Data')
                ->persistent('ok');
        }
        return redirect()->route('agent.contact_support.index');

    }


}
