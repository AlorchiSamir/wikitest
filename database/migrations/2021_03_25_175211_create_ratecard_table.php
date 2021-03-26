<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatecardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratecard', function (Blueprint $table) {
            $table->id();
            $table->integer('provider_id')->unsigned();
            $table->foreign('provider_id')
                  ->references('id')
                  ->on('provider')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('distribution_id')->unsigned();
            $table->foreign('distribution_id')
                  ->references('id')
                  ->on('distribution')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->string('name');
            $table->double('fixedfee', 8, 2);
            $table->double('mono_schedule', 5, 4);
            $table->double('day_schedule', 5, 4);
            $table->double('night_schedule', 5, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratecard');
    }
}
