<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('live_classes', function (Blueprint $table) {
            if (!Schema::hasColumn('live_classes', 'end_time')) {
                $table->dateTime('end_time')->nullable()->after('scheduled_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('live_classes', function (Blueprint $table) {
            $table->dropColumn(['end_time']);
        });
    }
};
