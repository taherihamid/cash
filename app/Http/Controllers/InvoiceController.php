<?php

namespace App\Http\Controllers;

use App\Invoice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setNewInvoice(Request $request)
    {
        Validator::make($request->all(), [
            'invoice_no' => 'required',
            'order_date' => 'required',
            'description' => 'required',
            'amount_to_pay' => 'required',
            'valid_until' => 'required',
            'included_tax' => 'required',
            'merchant_id' => 'required'
        ])->validate();

        $invoice = new Invoice();
        $invoice->invoice_no = $request->invoice_no;
        $invoice->order_date = $request->order_date;
        $invoice->description = $request->description;
        $invoice->amount_to_pay = $request->amount_to_pay;
        $invoice->valid_until = $request->valid_until;
        $invoice->included_tax = $request->included_tax;
        $invoice->merchant_id = $request->merchant_id;


        if ($invoice->save()) {
            alert()->success('Your Invoice No Is : ' . $request->invoice_no, 'Your Invoice Created Successfully')
                ->persistent('ok');

        } else {
            alert()->error('Please Insert Valid Data', 'Invalid Data')
                ->persistent('ok');


        }
        return redirect()->route('home');

    }

}
