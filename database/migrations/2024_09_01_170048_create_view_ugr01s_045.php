<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_ugr01s_045");
        DB::statement("
            CREATE VIEW view_ugr01s_045 AS
            SELECT *, SUBSTRING(ccod, -3) AS ccodmarca
            FROM ugr01s
            WHERE cind = '045'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_ugr01s_045");
    }
};
