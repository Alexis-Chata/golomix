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
        Schema::create('com26s', function (Blueprint $table) {
            $table->id();
            $table->string("cprom")->nullable()->default("-");
            $table->string("tprom")->nullable()->default("-");
            $table->string("clin")->nullable()->default("-");
            $table->string("qprecio")->nullable()->default("-");
            $table->string("qpordes")->nullable()->default("0");
            $table->date("finipro")->nullable()->default("-");
            $table->date("ffinpro")->nullable()->default("-");
            $table->string("ctipneg")->nullable()->default("-");
            $table->string("ctipro")->nullable()->default("02");
            $table->string("ccodart1")->nullable()->default("-");
            $table->string("qprod1")->nullable()->default("-");
            $table->string("cescom")->nullable()->default("-");
            $table->string("ccodart2")->nullable()->default("-");
            $table->string("qprod2")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->string("cidpr")->nullable()->default("-");
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('com26s');
    }
};
