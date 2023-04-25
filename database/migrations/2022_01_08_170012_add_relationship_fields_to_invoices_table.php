<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_id_fk_1396947')
                ->references('id')->on('merchants');



            $table->unsignedInteger('agent_id')->nullable();
            $table->foreign('agent_id', 'agent_id_fk_1396947')
                ->references('id')->on('agents');


        });

    }
}
