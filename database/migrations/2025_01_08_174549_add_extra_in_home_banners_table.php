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
        Schema::table('home_banners', function (Blueprint $table) {
            $table->json('extra')->nullable();
        });

        // Step 2: Backfill slugs for existing data
        DB::table('home_banners')->get()->each(function ($banner) {
            DB::table('home_banners')
                ->where('id', $banner->id)
                ->update(['extra' => [
                    'redirect_url' => '#',
                    'button_label' => 'Explore More',
                ]]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_banners', function (Blueprint $table) {
            $table->dropColumn(['extra']);
        });
    }
};
