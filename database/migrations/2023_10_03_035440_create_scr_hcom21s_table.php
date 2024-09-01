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
            $table->string("ord")->default('Y');
            $table->string("ccodart");
            $table->string("qcanped");
            $table->string("qcanofe")->default('0');
            $table->string("qcanobs")->default('0');
            $table->string("qcanenv")->default('0');
            $table->string("qcanprom")->default('0');
            $table->string("qpreuni");
            $table->string("qimp")->default('0');
            $table->string("tdes");
            $table->string("cps")->default('');
            $table->string("prom")->default('');
            $table->string("qdesc")->default('0');
            $table->string("qpordes")->default('0');
            $table->string("qdesisc")->default('0');
            $table->string("cpolcre")->default('');
            $table->string("cletd")->default('NP');
            $table->string("ccia")->default('11');
            $table->string("ctip")->default('3');
            $table->string("nfac");
            $table->string("nfacfull")->nullable()->default("-");
            $table->string("citem")->default('1');
            $table->string("qcanotr")->default('0');
            $table->string("ctipart")->default('1');
            $table->string("ndcto")->default('');
            $table->string("cprom")->default('');
            $table->string("qdesofe")->default('0');
            $table->string("qprecos")->default('0');
            $table->string("nped")->default('-');
            $table->string("clistpr")->default('001');
            $table->string("cuser")->default('-');
            $table->string("cidpr")->default('-');
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable();
            $table->timestamps();

            $table->unique(['ccodart', 'cletd', 'nfac']);
            $table->index('nfacfull', 'idx_scr_hcom21s_nfacfull');
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
