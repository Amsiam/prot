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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., Assistant Urban Planner
            $table->string('organization')->nullable(); // e.g., Sheltech Consultants Pvt. Ltd.
            $table->string('location')->nullable(); // e.g., Dhaka, Bangladesh
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->string('employment_type')->nullable(); // e.g., Full-time, Part-time, Contract, etc.
            $table->text('summary')->nullable(); // e.g., Team management, field research, etc.
            $table->text('responsibilities')->nullable(); // optional field for detailed bullets
            $table->text('achievements')->nullable();
            $table->string('link')->nullable(); // optional reference link
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
