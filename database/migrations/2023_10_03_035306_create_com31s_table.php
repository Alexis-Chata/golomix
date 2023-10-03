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
        Schema::create('com31s', function (Blueprint $table) {
            $table->id();
            $table->string("crut")->nullable()->default("-");
            $table->string("nsecprev")->nullable()->default("-");
            $table->string("ccli")->nullable()->default("-");
            $table->string("ctipmod")->nullable()->default("-");
            $table->string("cmod")->nullable()->default("-");
            $table->string("nsecmod")->nullable()->default("-");
            $table->string("ctipfv")->nullable()->default("-");
            $table->string("cuser")->nullable()->default("-");
            $table->string("cidpr")->nullable()->default("-");
            $table->date("fupgr")->nullable();
            $table->string("tupgr")->nullable()->default("-");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->unique(['ccli']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('com31s');
    }
};
