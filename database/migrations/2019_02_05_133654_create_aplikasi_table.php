<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->default('kosong');
            $table->string('logo_fe')->default('kosong');
            $table->string('logo_be')->default('kosong');
            $table->string('logo_sub_be')->default('kosong');
            $table->string('telepon')->default('kosong');
            $table->string('email')->default('kosong');
            $table->string('alamat')->default('kosong');
            $table->string('waktu_buka')->default('kosong');
            $table->string('keterangan')->default('kosong');
            $table->string('copyright')->default('kosong');
            $table->text('link_maps');
            $table->string('link_facebook')->default('kosong');
            $table->string('link_youtube')->default('kosong');
            $table->string('link_google')->default('kosong');
            $table->string('link_instagram')->default('kosong');

            $table->string('judul_jurusan')->default('kosong');
            $table->text('judul_sub_jurusan');
            $table->string('judul_berita')->default('kosong');
            $table->string('judul_sub_berita')->default('kosong');

            $table->string('judul_guru')->default('kosong');
            $table->text('judul_sub_guru');
            $table->string('judul_event')->default('kosong');
            $table->text('judul_sub_event');
            $table->string('judul_gallery')->default('kosong');
            $table->text('judul_sub_gallery');

            $table->string('gambar_login')->default('kosong');
            $table->string('gambar_slider')->default('kosong');
            $table->string('gambar_total_siswa')->default('kosong');
            $table->string('gambar_footer')->default('kosong');
            $table->string('jumlah_siswa')->default('kosong');
            $table->string('jumlah_guru')->default('kosong');
            $table->string('jumlah_prestasi')->default('kosong');
            $table->string('jumlah_jurusan')->default('kosong');
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
        Schema::dropIfExists('aplikasi');
    }
}
