<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1494942515RequestToTechnicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('request_to_technicals')) {
            Schema::create('request_to_technicals', function (Blueprint $table) {
                $table->increments('id');
                $table->string('request_name')->nullable();
                $table->text('small_description')->nullable();
                $table->enum('priority', ["High and Critical","High","Medium","Low"])->nullable();
                $table->integer('work_type_id')->unsigned()->nullable();
                $table->foreign('work_type_id', '37261_591b033385a06')->references('id')->on('time_work_types')->onDelete('cascade');
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '37261_591b03338b357')->references('id')->on('time_projects')->onDelete('cascade');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('request_to_technicals');
    }
}
