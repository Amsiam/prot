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
        Schema::create('research_areas', function (Blueprint $table) {
            $table->id();
            $table->string('title');         // e.g., "Geospatial Analysis"
            $table->text('description');     // e.g., "Advanced GIS and remote sensing..."
            $table->string('color')->nullable(); // optional border color or theme
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_areas');
    }
};
