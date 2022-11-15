<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('articulos', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->bigIncrements('id');

            $table->bigInteger('registro_id')->unsigned();

            $table->string('nombre');
            
            $table->timestamps();

            $table->foreign('registro_id')->references('id')->on('registros')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
