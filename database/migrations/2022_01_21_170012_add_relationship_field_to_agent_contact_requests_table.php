<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldToAgentContactRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('agent_contact_requests', function (Blueprint $table) {


            $table->unsignedInteger('agent_id')->nullable();
            $table->foreign('agent_id', 'agent_id_fk_1396942')
                ->references('id')->on('agents');


        });

    }
}
