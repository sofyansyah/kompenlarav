<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllJCRTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_JCR', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pcr_id');
            $table->string('jabatan');
            $table->integer('pcr_s');
            $table->integer('dept_read');
            $table->integer('jcr_staff');
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
        Schema::dropIfExists('all_JCR');
    }
}
