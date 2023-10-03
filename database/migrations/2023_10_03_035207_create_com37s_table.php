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
        Schema::create('com37s', function (Blueprint $table) {
            $table->id();
            $table->date("fmov")->nullable();
            $table->string("ccli")->nullable()->default("-");
            $table->string("qpreuni")->nullable()->default("-");
            $table->string("qimp")->nullable()->default("-");
            $table->string("ccodart")->nullable()->default("-");
            $table->string("qcanped")->nullable()->default("-");
            $table->string("tdes")->nullable()->default("-");
            $table->string("citem")->nullable()->default("-");
            $table->string("cprom")->nullable()->default("-");
            $table->string("cletd")->nullable()->default("-");
            $table->string("ctip")->nullable()->default("-");
            $table->string("nfac")->nullable()->default("-");
            $table->string("nped")->nullable()->default("-");
            $table->string("clistpr")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->unique(['nped', 'ccodart']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('com37s');
    }
};
