<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemberkasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemberkasan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jenis_formulir_id')->unsigned();
            $table->foreign('jenis_formulir_id')->references('id')->on('jenis_formulir')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ijazah_pdf');
            $table->string('pas_foto_2_3');
            $table->string('pas_foto_3_4');
            $table->string('kk');
            $table->string('akte_kelahiran');
            $table->string('ukuran_baju');
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
        Schema::dropIfExists('pemberkasan');
    }
}
