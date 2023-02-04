<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscontinuadoColumnsToCom01s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('com01s', function (Blueprint $table) {
            $table->string('discontinuado')->after('tupgr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('com01s', function (Blueprint $table) {
            $table->dropColumn(['discontinuado']);
        });
    }
}
