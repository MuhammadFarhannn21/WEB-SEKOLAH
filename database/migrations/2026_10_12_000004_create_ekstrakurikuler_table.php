<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkstrakurikulerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('ekstrakurikuler')) {
            return;
        }

        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('pembina')->nullable();
            $table->string('status', 50)->nullable()->default('aktif');
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
        Schema::dropIfExists('ekstrakurikuler');
    }
}
