<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldToAgentTopRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('agent_top_requests', function (Blueprint $table) {


            $table->unsignedInteger('agent_id')->nullable();
            $table->foreign('agent_id', 'agent_id_fk_1396949')
                ->references('id')->on('agents');


        });

    }
}
