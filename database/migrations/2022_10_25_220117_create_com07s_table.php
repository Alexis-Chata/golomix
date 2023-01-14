<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCom07sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com07s', function (Blueprint $table) {
            $table->id();
            $table->string("ccli")->nullable()->default("-");
            $table->string("ccia")->nullable()->default("-");
            $table->string("cter")->nullable()->default("-");
            $table->string("creg")->nullable()->default("-");
            $table->string("ccendis")->nullable()->default("-");
            $table->string("tnomrep")->nullable()->default("-");
            $table->string("tdir")->nullable()->default("-");
            $table->string("tcli")->nullable()->default("-");
            $table->string("ntel")->nullable()->default("-");
            $table->string("nfax")->nullable()->default("-");
            $table->string("le")->nullable()->default("-");
            $table->string("cdis")->nullable()->default("-");
            $table->string("ctipneg")->nullable()->default("-");
            $table->string("ctipcli")->nullable()->default("-");
            $table->string("ctipseg")->nullable()->default("-");
            $table->string("flagche")->nullable()->default("-");
            $table->string("cpop")->nullable()->default("-");
            $table->string("flagact")->nullable()->default("-");
            $table->date("fcre")->nullable();
            $table->string("cruc")->nullable()->default("-");
            $table->string("cban")->nullable()->default("-");
            $table->string("ncta")->nullable()->default("-");
            $table->string("cfac")->nullable()->default("-");
            $table->string("fnac")->nullable()->default("-");
            $table->string("crub")->nullable()->default("-");
            $table->string("flcre")->nullable()->default("-");
            $table->string("qmincaj")->nullable()->default("-");
            $table->string("qmincred")->nullable()->default("-");
            $table->date("fven")->nullable();
            $table->string("flven")->nullable()->default("-");
            $table->string("ncarcob")->nullable()->default("-");
            $table->string("qporcom")->nullable()->default("-");
            $table->date("fultcom")->nullable();
            $table->string("ncjscom")->nullable()->default("-");
            $table->string("crutd")->nullable()->default("-");
            $table->string("qporconc")->nullable()->default("-");
            $table->string("qmaxche")->nullable()->default("-");
            $table->string("flcen")->nullable()->default("-");
            $table->string("qcjobjp")->nullable()->default("-");
            $table->string("cobjp")->nullable()->default("-");
            $table->string("flenc")->nullable()->default("-");
            $table->string("ctipco")->nullable()->default("-");
            $table->string("ccade")->nullable()->default("-");
            $table->string("fligv")->nullable()->default("-");
            $table->string("cserie")->nullable()->default("-");
            $table->string("tdocid")->nullable()->default("-");
            $table->string("otrdoc")->nullable()->default("-");
            $table->string("ccate1")->nullable()->default("-");
            $table->string("ccate2")->nullable()->default("-");
            $table->string("csidoc")->nullable()->default("-");
            $table->string("ctipfv")->nullable()->default("-");
            $table->string("ncordx")->nullable()->default("-");
            $table->string("ncordy")->nullable()->default("-");
            $table->string("ccli1")->nullable()->default("-");
            $table->string("codcbc")->nullable()->default("-");
            $table->string("clistpr")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->string("cidpr")->nullable()->default("-");
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();

            $table->unique('ccli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('com07s');
    }
}
