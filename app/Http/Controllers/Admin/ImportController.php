<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\ImportInterface;

class ImportController extends Controller
{
    public $import;

    public function __construct(ImportInterface $import)
    {
        $this->import = $import;
    }

    public function form_excel()
    {
        return view('excel.form');
    }

    public function Tenders()
    {
        $file = request()->file;
        $message = $this->import->import($file);
        if($message['result'] == true) {
            session()->flash('success_flash', trans('messages.item_created'));
            return back();
        }else {
            session()->flash('error_flash', trans('messages.unknown_error'));
        }
        return redirect()->back();
    }

    public function TenderCallingDocuments()
    {
        $file = request()->file;
        $this->import->importTenderCallingDocuments($file);
    }

    public function TenderCallingDocumentAttachments()
    {
        $file = request()->file;
        $this->import->importTenderCallingDocumentAttachments($file);
    }

    public function ObsTablePerson()
    {
        $file = request()->file;
        $this->import->ObsTablePerson($file);
    }

    public function ObsTablePersonContact()
    {
        $file = request()->file;
        $this->import->ObsTablePersonContact($file);
    }
}
