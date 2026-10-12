<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisiMisiToAplikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aplikasi', function (Blueprint $table) {
            if (!Schema::hasColumn('aplikasi', 'visi')) {
                $table->text('visi')->nullable()->after('nama');
            }
            if (!Schema::hasColumn('aplikasi', 'misi')) {
                $table->text('misi')->nullable()->after('visi');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aplikasi', function (Blueprint $table) {
            $table->dropColumn(['visi', 'misi']);
        });
    }
}
