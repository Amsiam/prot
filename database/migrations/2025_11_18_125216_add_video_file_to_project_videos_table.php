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
        Schema::table('project_videos', function (Blueprint $table) {
            $table->string('video_url')->nullable()->change();
            $table->string('video_file')->nullable()->after('video_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_videos', function (Blueprint $table) {
            $table->string('video_url')->nullable(false)->change();
            $table->dropColumn('video_file');
        });
    }
};
