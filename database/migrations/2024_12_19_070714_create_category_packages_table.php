<?php

use App\Models\Category;
use App\Models\Package;
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
        Schema::create('category_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)
                ->nullable() // Allow null values
                ->constrained()
                ->onDelete('set null'); // Set foreign key to null on delete

            $table->foreignIdFor(Package::class)
                ->nullable() // Allow null values
                ->constrained()
                ->onDelete('set null'); // Set foreign key to null on delete

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_packages');
    }
};
