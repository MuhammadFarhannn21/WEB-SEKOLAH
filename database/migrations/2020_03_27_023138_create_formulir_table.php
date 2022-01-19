<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulir', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jenis_formulir_id')->unsigned();
            $table->foreign('jenis_formulir_id')->references('id')->on('jenis_formulir')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_panggilan');
            $table->string('nisn');
            $table->text('alamat_sekolah')->nullable();
            $table->string('asal_daerah_sekolah');
            $table->string('pilihan_pertama');
            $table->string('pilihan_kedua');
            $table->string('pilihan_ketiga');
            $table->string('kewarganegaraan');
            $table->string('anak_ke');
            $table->string('dari_berapa_bersaudara');
            $table->string('jumlah_saudara_tiri')->nullable();
            $table->string('jumlah_saudara_angkat')->nullable();
            $table->string('anak_yatim_piatu_angkat')->nullable();
            $table->string('bahasa');
            $table->string('nama_orangtua_atau_wali');
            $table->string('no_hp_orangtua_atau_wali');
            $table->string('tinggal');
            $table->string('jarak_tempat_tinggal');
            $table->string('kesekolah_dengan');
            $table->text('keterangan_kesehatan');
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('penyakit_yg_pernah_diderita');
            $table->string('bakat_khusus')->nullable();
            $table->string('prestasi_khusus')->nullable();
            $table->string('ekskul_yg_diminati');
            $table->string('informasi_penerimaan');
            $table->string('berasal_dari_smp');
            $table->string('berasal_dari_smp_terletak');
            $table->string('dalam_memilih_sekolah');
            $table->string('alasan_anda_mendaftar');
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
        Schema::dropIfExists('formulir');
    }
}
