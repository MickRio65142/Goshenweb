<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('student')->after('email');
            }
            if (!Schema::hasColumn('users', 'phone_number')) {
                $table->string('phone_number')->nullable()->after('role');
            }
        });

        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'title')) {
                $table->string('title')->nullable()->after('name');
            }
            if (!Schema::hasColumn('courses', 'credit_hours')) {
                $table->integer('credit_hours')->default(3)->after('description');
            }
        });

        Schema::table('enrollments', function (Blueprint $table) {
            if (!Schema::hasColumn('enrollments', 'progress_percentage')) {
                $table->integer('progress_percentage')->default(0)->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone_number']);
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['title', 'credit_hours']);
        });

        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropColumn(['progress_percentage']);
        });
    }
};
