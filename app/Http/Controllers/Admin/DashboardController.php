<?php

namespace App\Http\Controllers\Admin;


use App\CardPurchased;
use App\Events\vendorNotificationEvent;
use App\Invoice;
use App\Scheme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
//    protected $guard = 'admin';

    public function index()
    {
        $invoices = Invoice::with('merchants')->with('agents')->get();
//        dd($invoices);
        return view('admin_dashboard.index',compact('invoices'));
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
