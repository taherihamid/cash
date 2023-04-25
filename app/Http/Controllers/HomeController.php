<?php

namespace App\Http\Controllers;

use App\Tender;
use App\TenderCallingDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
    public function index()
    {

        return view('landing');
    }
    public function demo()
    {

        return view('demo');
    }

    public function show($tenderId, $tenderType)
    {
        $collection = DB::table('tender_table_tender as tender')->
        join('tender_table_tender_calling_document as calling', 'calling.TenderIDRef', '=', 'tender.TenderID')->
        join('tender_table_tender_calling_document_attachment as attachment',
            'attachment.TenderCallingDocumentIDRef', '=', 'calling.TenderCallingDocumentID')->
        select('*')
            ->get();
        $tender = $collection->where('TenderID', $tenderId)->where('tenderType', $tenderType)->first();
//        dd($tender);
        switch ($tenderType) {
            case 1:
                return view('landing.pages.events.moshakhasat_f', compact('tender'));
            break;
            case 2:
                return view('landing.pages.events.moshakhasat_f_m_omomi', compact('tender'));
            break;
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

        if(request()->TenderCallingDocumentID) {
            $collection->where('TenderCallingDocumentID', \request()->TenderCallingDocumentID);
        }
        if (\request()->subject) {
            $collection->where('subject', \request()->subject);
        }
        if (\request()->companyIDRef) {
            $collection->where('PersonTitle','like', '%'.\request()->companyIDRef.'%');
        }
        if (\request()->tenderType) {
            $collection->where('tenderType',\request()->tenderType);
        }
        if (\request()->WorkflowContractExecutionTypeIDRef) {
            $collection->where('WorkflowContractExecutionTypeIDRef',\request()->WorkflowContractExecutionTypeIDRef);
        }
        if (\request()->techSpecReqVolume) {
            $collection->where('techSpec','like', '%'.\request()->techSpecReqVolume.'%')->orWhere('ReqVolume', 'like', '%'.\request()->techSpecReqVolume.'%');
        }

        $collection = $collection->get();

//        dd($collection);

        return view('landing', compact('collection'));
    }
}
