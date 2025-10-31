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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('authors')->nullable();
            $table->text('publication_name')->nullable();
            $table->string('publication_type')->nullable(); // Journal / Conference / Book etc.
            $table->year('year')->nullable();
            $table->string('volume')->nullable();
            $table->string('pages')->nullable();
            $table->text('contribution')->nullable();
            $table->text('abstract')->nullable();
            $table->string('link')->nullable(); // URL to the publication
            $table->string('status')->nullable(); // Published / In Review / Draft etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
