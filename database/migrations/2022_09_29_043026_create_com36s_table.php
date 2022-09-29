<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCom36sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com36s', function (Blueprint $table) {
            $table->id();
            $table->string("CZON")->nullable()->default("-");
            $table->string("CRUT")->nullable()->default("-");
            $table->string("CLETD")->nullable()->default("-");
            $table->string("CTIP")->nullable()->default("-");
            $table->string("NFAC")->nullable()->default("-");
            $table->string("CVEN")->nullable()->default("-");
            $table->string("CCLI")->nullable()->default("-");
            $table->string("FMOV")->nullable()->default("-");
            $table->string("FEMI")->nullable()->default("-");
            $table->string("TNOMREP")->nullable()->default("-");
            $table->string("CRUCCLI")->nullable()->default("-");
            $table->string("TDIR")->nullable()->default("-");
            $table->string("QDESIGV")->nullable()->default("-");
            $table->string("QIMPTOT")->nullable()->default("-");
            $table->string("QIMPVTA")->nullable()->default("-");
            $table->string("QIMPCOM")->nullable()->default("-");
            $table->string("FVEN")->nullable()->default("-");
            $table->string("TVEN")->nullable()->default("-");
            $table->string("CRUCCIA")->nullable()->default("-");
            $table->string("FLIQ")->nullable()->default("-");
            $table->string("CTIPLIQ")->nullable()->default("-");
            $table->string("NPED")->nullable()->default("-");
            $table->string("CMOD")->nullable()->default("-");
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
        Schema::dropIfExists('com36s');
    }
}
