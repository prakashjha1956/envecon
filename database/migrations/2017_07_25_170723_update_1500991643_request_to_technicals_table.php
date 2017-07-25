<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1500991643RequestToTechnicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_to_technicals', function (Blueprint $table) {
            $table->integer('name_id')->unsigned()->nullable();
                $table->foreign('name_id', '37261_5977509a8a330')->references('id')->on('statuses')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_to_technicals', function (Blueprint $table) {
            $table->dropForeign('37261_5977509a8a330');
            $table->dropIndex('37261_5977509a8a330');
            $table->dropColumn('name_id');
            
        });

    }
}
