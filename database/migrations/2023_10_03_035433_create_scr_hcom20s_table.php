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
            $table->string("cletd")->nullable()->default("-");
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
            $table->text("cconaux")->nullable();
            $table->text("ctipliq")->nullable();
            $table->text("flagenv")->nullable();
            $table->text("flagdeg")->nullable();
            $table->text("cmod")->nullable();
            $table->text("flagvcd")->nullable();
            $table->text("ndcto")->nullable();
            $table->text("flagnv")->nullable();
            $table->text("cletori")->nullable();
            $table->text("ctipori")->nullable();
            $table->text("nfacori")->nullable();
            $table->text("ctipnc")->nullable();
            $table->text("nliq")->nullable();
            $table->text("nguia")->nullable();
            $table->string("nped")->nullable();
            $table->text("flggen")->nullable();
            $table->text("flgenv")->nullable();
            $table->text("flgrec")->nullable();
            $table->text("codhash")->nullable();
            $table->text("codcdr")->nullable();
            $table->text("clistpr")->nullable();
            $table->text("cuser")->nullable();
            $table->text("cidpr")->nullable();
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->unique(['nfac', 'ccli']);
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
