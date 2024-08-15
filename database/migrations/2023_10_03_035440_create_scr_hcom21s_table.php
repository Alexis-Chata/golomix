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
        Schema::create('scr_hcom21s', function (Blueprint $table) {
            $table->id();
            $table->string("ORD")->nullable()->default('-');
            $table->string("CCODART")->nullable()->default('-');
            $table->string("QCANPED")->nullable()->default('-');
            $table->string("QCANOFE")->nullable()->default('-');
            $table->string("QCANOBS")->nullable()->default('-');
            $table->string("QCANENV")->nullable()->default('-');
            $table->string("QCANPROM")->nullable()->default('-');
            $table->string("QPREUNI")->nullable()->default('-');
            $table->string("QIMP")->nullable()->default('-');
            $table->string("TDES")->nullable()->default('-');
            $table->string("CPS")->nullable()->default('-');
            $table->string("PROM")->nullable()->default('-');
            $table->string("QDESC")->nullable()->default('-');
            $table->string("QPORDES")->nullable()->default('-');
            $table->string("QDESISC")->nullable()->default('-');
            $table->string("CPOLCRE")->nullable()->default('-');
            $table->string("CLETD")->nullable()->default('-');
            $table->string("CCIA")->nullable()->default('-');
            $table->string("CTIP")->nullable()->default('-');
            $table->string("NFAC")->nullable()->default('-');
            $table->string("CITEM")->nullable()->default('-');
            $table->string("QCANOTR")->nullable()->default('-');
            $table->string("CTIPART")->nullable()->default('-');
            $table->string("NDCTO")->nullable()->default('-');
            $table->string("CPROM")->nullable()->default('-');
            $table->string("QDESOFE")->nullable()->default('-');
            $table->string("QPRECOS")->nullable()->default('-');
            $table->string("NPED")->nullable()->default('-');
            $table->string("CLISTPR")->nullable()->default('-');
            $table->string("CUSER")->nullable()->default('-');
            $table->string("CIDPR")->nullable()->default('-');
            $table->string("FUPGR")->nullable()->default('-');
            $table->string("TUPGR")->nullable()->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scr_hcom21s');
    }
};
