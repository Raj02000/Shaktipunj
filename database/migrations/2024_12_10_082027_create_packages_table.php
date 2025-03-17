<?php

use App\Models\Destination;
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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('slug');
            $table->foreignIdFor(Destination::class);
            $table->string('location');
            $table->integer('duration');
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->json('overview')->nullable();
            $table->json('itinerary')->nullable();
            $table->string('trip_map')->nullable();
            $table->json('what_we_expect')->nullable();
            $table->json('cost_dates')->nullable();
            $table->json('useful_info')->nullable();
            $table->json('faqs')->nullable();
            $table->json('reviews')->nullable();
            $table->json('extra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
