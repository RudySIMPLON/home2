<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('event_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('responsables_id')->unsigned();
            $table->foreign('responsables_id')
            ->references('id')
            ->on('responsables')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->integer('conseiller_id')->unsigned();
            $table->foreign('conseiller_id')
            ->references('id')
            ->on('conseiller')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}