<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCom37sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com37s', function (Blueprint $table) {
            $table->id();
            $table->string("FMOV")->nullable()->default("-");
            $table->string("CCLI")->nullable()->default("-");
            $table->string("QPREUNI")->nullable()->default("-");
            $table->string("QIMP")->nullable()->default("-");
            $table->string("CCODART")->nullable()->default("-");
            $table->string("QCANPED")->nullable()->default("-");
            $table->string("TDES")->nullable()->default("-");
            $table->string("CITEM")->nullable()->default("-");
            $table->string("CPROM")->nullable()->default("-");
            $table->string("CLETD")->nullable()->default("-");
            $table->string("CTIP")->nullable()->default("-");
            $table->string("NFAC")->nullable()->default("-");
            $table->string("NPED")->nullable()->default("-");
            $table->string("CLISTPR")->nullable()->default("-");
            $table->string("CUSER")->nullable()->default("-");
            $table->string("FUPGR")->nullable()->default("-");
            $table->string("TUPGR")->nullable()->default("-");
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
        Schema::dropIfExists('com37s');
    }
}
