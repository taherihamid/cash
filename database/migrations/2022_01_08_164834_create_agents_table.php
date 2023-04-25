<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('business')->nullable();
            $table->text('business_detail')->nullable();
            $table->string('personal_id');
            $table->string('password');
            $table->string('IBAN')->nullable();
            $table->integer('credit_limit')->nullable();
            $table->integer('available_credit')->nullable();
            $table->integer('commission')->nullable();
            $table->integer('commission_type')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
