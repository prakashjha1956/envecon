<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create591cb376cfa87RequestToTechnicalUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('request_to_technical_user')) {
            Schema::create('request_to_technical_user', function (Blueprint $table) {
                $table->integer('request_to_technical_id')->unsigned()->nullable();
                $table->foreign('request_to_technical_id', 'fk_p_37261_37255_user_req_591cb376cfb8e')->references('id')->on('request_to_technicals')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_37255_37261_requestt_591cb376cfc0f')->references('id')->on('users')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_to_technical_user');
    }
}
