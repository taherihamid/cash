<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\ExportInterface;
use App\Person;
use App\PersonContact;
use App\Tender;
use App\TenderCallingDocument;
use App\TenderCallingDocumentAttachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    public $excel;

    public function __construct(ExportInterface $excel)
    {
        $this->excel = $excel;
    }

    public function exportExcelTenderTableTender()
    {
        $mainQuery = Tender::query()->get()->toArray();

//        dd($mainQuery);

        $format = ['0' => 'string',
            '1' => 'string',
            '2' => 'string',
            '3' => 'string',
            '4' => 'string',
            '5' => 'string',
            '6' => 'string',
            '7' => 'string',
            '8' => 'string',
            '9' => 'integer',
            '10' => 'string',
            '11' => 'integer',
            '12' => 'string',
            '13' => 'string',
            '14' => 'string',
            '15' => 'string',
            '16' => 'string',
            '17' => 'string',
            '18' => 'string',
            '19' => 'integer',
            '20' => 'integer',
            '21' => 'integer',
            '22' => 'string',
            '23' => 'string',
            '24' => 'integer',
            '25' => 'string',
            '26' => 'integer-sepatator',
            '27' => 'integer-sepatator',
            '28' => 'string',
            '29' => 'string',
        ];

        $this->excel->export($mainQuery, "tender_table_tender", "tender_table_tender", $format);
    }

    public function exportExcelTenderTableTenderCallingDocuments()
    {
        $mainQuery = TenderCallingDocument::query()->get()->toArray();

//        dd($mainQuery);

        $format = ['0' => 'string',
            '1' => 'string',
            '2' => 'string',
            '3' => 'string',
            '4' => 'string',
            '5' => 'string',
            '6' => 'string',
            '7' => 'string',
            '8' => 'string',
            '9' => 'integer',
            '10' => 'string',
            '11' => 'integer',
            '12' => 'string',
            '13' => 'string',
            '14' => 'string',
            '15' => 'string',
            '16' => 'string',
            '17' => 'string',
            '18' => 'string',
            '19' => 'integer',
            '20' => 'integer',
            '21' => 'integer',
            '22' => 'string',
            '23' => 'string',
            '24' => 'integer',
            '25' => 'string',
            '26' => 'integer-sepatator',
            '27' => 'integer-sepatator',
            '28' => 'string',
            '29' => 'string',
        ];

        $this->excel->export($mainQuery, "tender_table_tender", "tender_table_tender", $format);
    }

    public function exportExcelTenderTableTenderCallingDocumentAttachments()
    {
        $mainQuery = TenderCallingDocumentAttachment::query()->get()->toArray();

//        dd($mainQuery);

        $format = ['0' => 'string',
            '1' => 'string',
            '2' => 'string',
            '3' => 'string',
            '4' => 'string',
            '5' => 'string',
            '6' => 'string',
            '7' => 'string',
            '8' => 'string',
            '9' => 'integer',
            '10' => 'string',
            '11' => 'integer',
            '12' => 'string',
            '13' => 'string',
            '14' => 'string',
            '15' => 'string',
            '16' => 'string',
            '17' => 'string',
            '18' => 'string',
            '19' => 'integer',
            '20' => 'integer',
            '21' => 'integer',
            '22' => 'string',
            '23' => 'string',
            '24' => 'integer',
            '25' => 'string',
            '26' => 'integer-sepatator',
            '27' => 'integer-sepatator',
            '28' => 'string',
            '29' => 'string',
        ];

        $this->excel->export($mainQuery, "tender_table_tender", "tender_table_tender", $format);
    }

    public function exportExcelObsTablePerson()
    {
        $mainQuery = Person::query()->get()->toArray();

//        dd($mainQuery);

        $format = ['0' => 'string',
            '1' => 'string',
            '2' => 'string',
            '3' => 'string',
            '4' => 'string',
            '5' => 'string',
            '6' => 'string',
            '7' => 'string',
            '8' => 'string',
            '9' => 'integer',
            '10' => 'string',
            '11' => 'integer',
            '12' => 'string',
            '13' => 'string',
            '14' => 'string',
            '15' => 'string',
            '16' => 'string',
            '17' => 'string',
            '18' => 'string',
            '19' => 'integer',
            '20' => 'integer',
            '21' => 'integer',
            '22' => 'string',
            '23' => 'string',
            '24' => 'integer',
            '25' => 'string',
            '26' => 'integer-sepatator',
            '27' => 'integer-sepatator',
            '28' => 'string',
            '29' => 'string',
            '30' => 'string',
            '31' => 'string',
            '32' => 'string',
            '33' => 'string',
            '34' => 'string',
            '35' => 'string',
            '36' => 'string',
            '37' => 'string',
            '38' => 'string',
            '39' => 'string',
        ];

        $this->excel->export($mainQuery, "tender_table_tender", "tender_table_tender", $format);
    }

    public function exportExcelObsTablePersonContact()
    {
        $mainQuery = PersonContact::query()->get()->toArray();

//        dd($mainQuery);

        $format = ['0' => 'string',
            '1' => 'string',
            '2' => 'string',
            '3' => 'string',
            '4' => 'string',
            '5' => 'string',
            '6' => 'string',
            '7' => 'string',
            '8' => 'string',
            '9' => 'integer',
            '10' => 'string',
            '11' => 'integer',
            '12' => 'string',
            '13' => 'string',
            '14' => 'string',
            '15' => 'string',
            '16' => 'string',
        ];

        $this->excel->export($mainQuery, "tender_table_tender", "tender_table_tender", $format);
    }
}
