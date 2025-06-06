<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('wallets', function (Blueprint $table) {
            $table->decimal('deposit', 10, 2)->change();
        });

        DB::statement("ALTER TABLE wallets ALTER COLUMN deposit SET DEFAULT 0.00");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wallets', function (Blueprint $table) {
            $table->string('deposit')->change();
        });

        DB::statement("ALTER TABLE wallets ALTER COLUMN deposit DROP DEFAULT");
    }
};
