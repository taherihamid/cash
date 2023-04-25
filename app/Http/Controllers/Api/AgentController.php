<?php

namespace App\Http\Controllers;

use OpenApi\Tests\Fixtures\Processors\Nesting\ApiController;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AgentController extends ApiController
{

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
//        $this->middleware('auth:admin');
    }

    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function payments()
    {
        $data[] = [

            "RecordID" => 1,
            "OrderID" => "64616-103",
            "Country" => "Brazil",
            "ShipCity" => "S\u00e3o F\u00e9lix do Xingu",
            "CompanyAgent" => "Hayes Boule",
            "ShipDate" => "10/15/2017",
            "Status" => 5,
            "Type" => 1,
            "Actions" => null
        ];

        return response()->json( [$data] );
    }
}
