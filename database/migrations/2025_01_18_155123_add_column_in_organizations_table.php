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
        Schema::table('organizations', function (Blueprint $table) {
            $table->string('youtube')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('license_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('youtube')->nullable();
            $table->dropColumn('pinterest')->nullable();
            $table->dropColumn('license_no')->nullable();
        });
    }
};

