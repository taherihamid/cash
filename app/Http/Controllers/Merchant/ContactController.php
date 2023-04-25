<?php

namespace App\Http\Controllers\Merchant;


use App\Classes\Response;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Menu;
use App\MerchantContact;
use Auth;
use App\MenuItems;
use App\Merchant;
use App\MerchantCash;
use App\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Self_;


class ContactController extends Controller
{
    protected $guard = 'merchant';


    public function index()
    {

        $merchant = Merchant::find(Auth::guard('merchant')->user()->id);

        return view('merchant_dashboard.contact_support.index', compact('merchant'));
    }


    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'merchant_id' => 'required',
            'body' => 'required',

        ]);
        if ($validator->fails()) {
            alert()->error('Please Insert Valid Data', 'Invalid Data')
                ->persistent('ok');
        }

        $merchant = Merchant::where('id', $request->input('merchant_id'))->first();

        if($merchant){
            $merchant_request = MerchantContact::create([
                'body' => $request->input('body'),
                'status' => MerchantContact::IN_PROGRESS,
                'merchant_id' => $merchant->id,

            ]);
            if($merchant_request->save()){

                alert()->success('', 'Your Request Registered Successfully')
                    ->persistent('ok');
            }else{
                alert()->error('oops!', 'Unknown Error')
                    ->persistent('ok');
            }

        }else{
            alert()->error('Please Insert Valid Valid Data', 'Invalid Data')
                ->persistent('ok');
        }
        return redirect()->route('merchant.contact_support.index');

    }

}
