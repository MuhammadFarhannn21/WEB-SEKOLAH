<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('acara_id')->unsigned();
            $table->foreign('acara_id')->references('id')->on('acara')->onDelete('cascade');
            $table->string('nama');
            $table->string('instansi');
            $table->string('telepon');
            $table->string('email');
            $table->string('photo')->nullable();
            $table->string('alamat');
            $table->string('keterangan')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('tamu');
    }
}
