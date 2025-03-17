<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1: Add the slug column as nullable
        Schema::table('tags', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });

        // Step 2: Backfill slugs for existing data
        DB::table('tags')->get()->each(function ($tag) {
            DB::table('tags')
                ->where('id', $tag->id)
                ->update(['slug' => Str::slug($tag->name)]);
        });

        // Step 3: Make the slug column non-nullable
        Schema::table('tags', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn(['slug']);
        });
    }
};
