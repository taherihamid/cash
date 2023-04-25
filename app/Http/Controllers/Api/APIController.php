<?php

namespace App\Http\Controllers\Api;


use App\UniversityUserLog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class APIController extends Controller
{

    const HTTP_OK = 200;
    const HTTP_NO_CONTENT = 204;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_NOT_FOUND = 404;
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_UNPROCESSABLE_ENTITY = 422;
    const HTTP_SSO_LOGIN_ERROR = 440;
    const HTTP_ERROR = 500;

    const MESSAGE_SUCCESS = 1;
    const MESSAGE_VALIDATION_ERROR = 2;
    const MESSAGE_UNKNOWN_ERROR = 3;
    const MESSAGE_NOT_FOUND = 4;

    const COLLECTION = 'collect';

    public function getMerchantInvoice(Request $request)
    {
        $description = $request->description;
        $amount = $request->amount;
        $tax = $request->tax;
        $order_date = $request->order_date;
        $order_status = $request->order_status;
        $valid_until = $request->valid_until;
        $invoice_no = $request->invoice_no;
        $merchant_id = auth()->id();
        $agent_id = $request->agent_id;

        Invoice::create([
            'description' => $description,
            'amount_to_pay' => $amount,
            'included_tax' => $tax,
            'order_date' => $order_date,
            'order_status' => $order_status,
            'valid_until' => $valid_until,
            'amount_to_pay' => $invoice_no,
            'invoice_no' => $amount,
            'merchant_id' => $merchant_id,
            'agent_id' => $agent_id,
        ]);

        return response()->json([
            'message' => self::MESSAGE_SUCCESS
        ], self::HTTP_OK);
    }


}
