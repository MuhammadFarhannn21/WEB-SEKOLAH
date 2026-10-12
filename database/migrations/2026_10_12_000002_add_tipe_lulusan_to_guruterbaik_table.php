<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipeLulusanToGuruterbaikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guruterbaik', function (Blueprint $table) {
            if (!Schema::hasColumn('guruterbaik', 'tipe')) {
                $table->string('tipe', 50)->nullable()->default('Guru')->after('status');
            }
            if (!Schema::hasColumn('guruterbaik', 'lulusan')) {
                $table->string('lulusan')->nullable()->after('tipe');
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
        Schema::table('guruterbaik', function (Blueprint $table) {
            $table->dropColumn(['tipe', 'lulusan']);
        });
    }
}
