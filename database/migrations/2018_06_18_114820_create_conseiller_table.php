<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConseillerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conseiller', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom');
            $table->string('email')->unique();
            $table->integer('responsables_id')->unsigned();
            $table->foreign('responsables_id')
                  ->references('id')
                  ->on('responsables')
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
        Schema::dropIfExists('responsable');
    }
}
