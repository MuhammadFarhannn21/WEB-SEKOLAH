<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUangPangkalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_pangkal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jenis_formulir_id')->unsigned();
            $table->foreign('jenis_formulir_id')->references('id')->on('jenis_formulir')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cicilan_1_jumlah');
            $table->string('cicilan_1_bukti');
            $table->string('cicilan_1_status');
            $table->integer('cicilan_2_jumlah')->nullable();
            $table->string('cicilan_2_bukti')->nullable();
            $table->string('cicilan_2_status')->nullable();
            $table->integer('cicilan_3_jumlah')->nullable();
            $table->string('cicilan_3_bukti')->nullable();
            $table->string('cicilan_3_status')->nullable();
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
        Schema::dropIfExists('uang_pangkal');
    }
}
