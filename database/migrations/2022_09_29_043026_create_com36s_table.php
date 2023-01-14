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
            $table->string("czon")->nullable()->default("-");
            $table->string("crut")->nullable()->default("-");
            $table->string("cletd")->nullable()->default("-");
            $table->string("ctip")->nullable()->default("-");
            $table->string("nfac")->nullable()->default("-");
            $table->string("cven")->nullable()->default("-");
            $table->string("ccon")->nullable()->default("-");
            $table->string("ccli")->nullable()->default("-");
            $table->date("fmov")->nullable();
            $table->date("femi")->nullable();
            $table->string("tnomrep")->nullable()->default("-");
            $table->string("cruccli")->nullable()->default("-");
            $table->string("tdir")->nullable()->default("-");
            $table->string("qdesigv")->nullable()->default("-");
            $table->string("qimptot")->nullable()->default("-");
            $table->string("qimpvta")->nullable()->default("-");
            $table->string("qimpcom")->nullable()->default("-");
            $table->date("fven")->nullable();
            $table->string("tven")->nullable()->default("-");
            $table->string("cruccia")->nullable()->default("-");
            $table->date("fliq")->nullable();
            $table->string("ctipliq")->nullable()->default("-");
            $table->string("nped")->nullable()->default("-");
            $table->string("cmod")->nullable()->default("-");
            $table->string("clistpr")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();

            $table->unique('nped');
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
