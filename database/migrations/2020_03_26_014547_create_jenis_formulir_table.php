<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisFormulirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_formulir', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('tahun_ajaran');
            $table->string('status');
            $table->string('biaya_formulir');
            $table->string('no_rekening');
            $table->string('nama_bank_rekening');
            $table->string('biaya_uang_pangkal');
            $table->string('minimal_uang_pangkal');
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
        Schema::dropIfExists('jenis_formulir');
    }
}
