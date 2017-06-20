<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcrTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcr', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kompetensi_id');
            $table->integer('karyawan_id');
            $table->integer('sem_1');
            $table->integer('readliness');
            $table->integer('sem_2');
            $table->integer('pcr');
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
        Schema::dropIfExists('pcr');
    }
}
