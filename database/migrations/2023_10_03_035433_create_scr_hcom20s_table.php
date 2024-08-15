<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scr_hcom20s', function (Blueprint $table) {
            $table->id();
            $table->string("cter")->nullable()->default("-");
            $table->string("creg")->nullable()->default("-");
            $table->string("ccendis")->nullable()->default("-");
            $table->string("cdis")->nullable()->default("-");
            $table->string("care")->nullable()->default("-");
            $table->string("czon")->nullable()->default("-");
            $table->string("crut")->nullable()->default("-");;
            $table->string("csisven")->nullable()->default("-");
            $table->string("clin")->nullable()->default("-");
            $table->string("cletd")->default("NP");
            $table->string("ccia")->nullable()->default("-");
            $table->string("ctip")->nullable()->default("-");
            $table->string("nfac")->nullable()->default("-");;
            $table->string("cven")->nullable()->default("-");
            $table->string("csup")->nullable()->default("-");
            $table->string("cjefv")->nullable()->default("-");
            $table->string("cadm")->nullable()->default("-");
            $table->string("ccon")->nullable()->default("-");;
            $table->string("ccli")->nullable()->default("-");
            $table->date("fmov")->nullable();
            $table->date("femi")->nullable();
            $table->string("ord")->nullable()->default("-");
            $table->string("tnomrep")->nullable()->default("-");
            $table->string("cruccli")->nullable()->default("-");
            $table->string("tdir")->nullable()->default("-");
            $table->string("qdesofe")->nullable()->default("-");
            $table->string("qdesobs")->nullable()->default("-");
            $table->string("qdescom")->nullable()->default("-");
            $table->string("qdesigv")->nullable()->default("-");
            $table->string("qdesipm")->nullable()->default("-");
            $table->string("qdesisc")->nullable()->default("-");
            $table->string("qimptot")->nullable()->default("-");
            $table->string("qimpvta")->nullable()->default("-");
            $table->string("qimpcom")->nullable()->default("-");
            $table->string("cesdoc")->nullable()->default("-");
            $table->string("cconpag")->nullable()->default("-");
            $table->string("plazo")->nullable()->default("-");
            $table->date("fven")->nullable();
            $table->string("qmaxche")->nullable()->default("-");
            $table->string("ndoc")->nullable()->default("-");
            $table->string("ngui")->nullable()->default("-");
            $table->string("cmrp")->nullable()->default("-");
            $table->string("qcaj24")->nullable()->default("-");
            $table->string("qcaj12")->nullable()->default("-");
            $table->string("qcaj06")->nullable()->default("-");
            $table->string("tven")->nullable()->default("-");
            $table->string("cruccia")->nullable()->default("-");
            $table->date("fliq")->nullable();
            $table->string("cconaux")->nullable();
            $table->string("ctipliq")->nullable();
            $table->string("flagenv")->nullable();
            $table->string("flagdeg")->nullable();
            $table->string("cmod")->nullable();
            $table->string("flagvcd")->nullable();
            $table->string("ndcto")->nullable();
            $table->string("flagnv")->nullable();
            $table->string("cletori")->nullable();
            $table->string("ctipori")->nullable();
            $table->string("nfacori")->nullable();
            $table->string("ctipnc")->nullable();
            $table->string("nliq")->nullable();
            $table->string("nguia")->nullable();
            $table->string("nped")->nullable();
            $table->string("flggen")->nullable();
            $table->string("flgenv")->nullable();
            $table->string("flgrec")->nullable();
            $table->string("codhash")->nullable();
            $table->string("codcdr")->nullable();
            $table->string("clistpr")->nullable();
            $table->string("cuser")->nullable();
            $table->string("cidpr")->nullable();
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->unique(['cletd', 'nfac']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scr_hcom20s');
    }
};
