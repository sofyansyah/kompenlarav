<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKompetensiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompetensi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karyawan_id');
            $table->string('komp_1');
            $table->integer('standar_1');
            $table->integer('nilai_1');
            $table->integer('gap_1');
            $table->string('komp_2');
            $table->integer('standar_2');
            $table->integer('nilai_2');
            $table->integer('gap_2');
            $table->string('komp_3');
            $table->integer('standar_3');
            $table->integer('nilai_3');
            $table->integer('gap_3');
            $table->string('komp_4');
            $table->integer('standar_4');
            $table->integer('nilai_4');
            $table->integer('gap_4');
            $table->string('komp_5');
            $table->integer('standar_5');
            $table->integer('nilai_5');
            $table->integer('gap_5');
            $table->string('komp_6');
            $table->integer('standar_6');
            $table->integer('nilai_6');
            $table->integer('gap_6');
            $table->string('komp_7');
            $table->integer('standar_7');
            $table->integer('nilai_7');
            $table->integer('gap_7');
            $table->string('komp_8');
            $table->integer('standar_8');
            $table->integer('nilai_8');
            $table->integer('gap_8');
            $table->string('komp_9');
            $table->integer('standar_9');
            $table->integer('nilai_9');
            $table->integer('gap_9');
            $table->string('komp_10');
            $table->integer('standar_10');
            $table->integer('nilai_10');
            $table->integer('gap_10');
            $table->string('komp_11');
            $table->integer('standar_11');
            $table->integer('nilai_11');
            $table->integer('gap_11');
            $table->string('komp_12');
            $table->integer('standar_12');
            $table->integer('nilai_12');
            $table->integer('gap_12');
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
        Schema::dropIfExists('kompetensi');
    }
}
