<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldToMerchantContactRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('merchant_contact_requests', function (Blueprint $table) {


            $table->unsignedInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_id_fk_1396349')
                ->references('id')->on('merchants');


        });

    }
}
