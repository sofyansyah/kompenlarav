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
            $table->integer('karyawan_id');
            $table->string('nama');
            $table->string('jen_jabatan');
            $table->string('jabatan');
            $table->integer('kompeten_id');
            $table->string('komp_1');
            $table->integer('standar_1');
            $table->string('komp_2');
            $table->integer('standar_2');
            $table->string('komp_3');
            $table->integer('standar_3');
            $table->string('komp_4');
            $table->integer('standar_4');
            $table->string('komp_5');
            $table->integer('standar_5');
            $table->string('komp_6');
            $table->integer('standar_6');
            $table->string('komp_7');
            $table->integer('standar_7');
            $table->string('komp_8');
            $table->integer('standar_8');
            $table->string('komp_9');
            $table->integer('standar_9');
            $table->string('komp_10');
            $table->integer('standar_10');
            $table->string('komp_11');
            $table->integer('standar_11');
            $table->string('komp_12');
            $table->integer('standar_12');
            $table->integer('sem_1');
            $table->integer('readliness');
            $table->integer('sem_2');
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
