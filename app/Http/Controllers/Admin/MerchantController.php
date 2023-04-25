<?php

namespace App\Http\Controllers\Admin;


use App\Agent;

use App\Classes\Response;
use App\Events\Registered;
use App\Invoice;

use App\Merchant;
use App\MerchantCash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MerchantController extends Controller
{
    public function index()
    {

        $merchants = Merchant::all();

        return view('admin_dashboard.merchant.index', compact('merchants'));
    }

    public function create()
    {

        return view('admin_dashboard.merchant.create');
    }



    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255',
            'phone' => 'required',
            'business' => 'required|max:255',
            'business_detail' => 'required',
            'IBAN' => 'required',
            'email' => 'required|email|max:255|unique:merchants',

        ]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }
        $new_merchant = Merchant::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'business' => $request->business,
            'business_detail' => $request->business_detail,
            'IBAN' => $request->IBAN,
            'email' => $request->email,
        ]);

        if ($new_merchant) {
            $new_merchant->status = Merchant::APPROVED_STATUS;
            $pass_key = Str::random(8);

            $personal_id = rand(1000000000, 9999999999);
            $api_private_key = Str::random(16);
            $new_merchant->password = bcrypt($pass_key);
            $new_merchant->personal_id = $personal_id;
            $new_merchant->api_key = $api_private_key;
            if ($new_merchant->save()) {
                event(new Registered($new_merchant->email, $personal_id, $pass_key, $api_private_key));
                alert()->success('Your Personal ID Is : ' . $personal_id . ' ' . 'Your Password  Is : ' . $pass_key, 'Your Api Key  Is : ' . $api_private_key)
                    ->persistent('ok');

            } else {
                alert()->error('Please Insert Valid Data', 'Invalid Data')
                    ->persistent('ok');
            }
        } else {
            alert()->error('Please Try Later', 'Unknown Error');
            return redirect()->back();
        }

        return redirect()->route('admin.merchant.index');


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


    public function updateMerchantInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'client_id' => ['required'],
            'IBAN' => ['required'],

        ]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }
        $merchant = Merchant::where('id', $request->client_id)->first();
        $merchant->IBAN = $request->IBAN;
        $merchant->status = Merchant::APPROVED_STATUS;

        $pass_key = Str::random(8);

        $personal_id = rand(1000000000, 9999999999);
        $api_private_key = Str::random(16);
        $merchant->password = bcrypt($pass_key);
        $merchant->personal_id = $personal_id;
        $merchant->api_key = $api_private_key;


        if ($merchant->save()) {

            $merchant['pass_key'] = $pass_key;
            return Response::json('messages.success', $merchant, self::HTTP_OK);
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }
    }


    public function sentMerchantEmail(Request $request)
    {

        $validator = Validator::make($request->all(), ['body' => ['required']]);
        if ($validator->fails()) {
            return Response::validation($validator->errors());
        }


        $merchant = Merchant::where('id', $request->body['id'])->first();

        if (event(new Registered($merchant->email, $merchant->personal_id, $request->body['pass_key'], $merchant->api_key))) {


            return Response::json('messages.success', $merchant, self::HTTP_OK);
        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }
    }
    public function fetchSettlementRequest(Request $request)
    {
        $merchants = MerchantCash::with('merchant')->get();
        if ($merchants) {
            return Response::json('messages.success', $merchants, self::HTTP_OK);
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


        $merchant_request = MerchantCash::where('id', $request->input('cash_id'))->first();

        if ($merchant_request) {
            $merchant_request->status = MerchantCash::PAID;
            $merchant = Merchant::find($merchant_request->merchant_id);
            $merchant->cash_out =  $merchant_request->requested_amount;
            if ($merchant_request->save() && $merchant->save()) {
                return Response::json('messages.success', $merchant_request, self::HTTP_OK);
            } else {
                return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
            }


        } else {
            return Response::json('messages.unknown_error', null, self::HTTP_NOT_FOUND);
        }
    }
}
