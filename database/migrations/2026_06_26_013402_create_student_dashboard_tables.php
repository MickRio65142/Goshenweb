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
        // 1. Courses Table
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 2. Enrollments Table (associates students with courses)
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('active'); // active, completed, suspended
            $table->timestamps();
        });

        // 3. Grades and CA Marks Table
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->decimal('ca_mark', 5, 2)->nullable();
            $table->decimal('exam_mark', 5, 2)->nullable();
            $table->decimal('total_mark', 5, 2)->nullable();
            $table->string('grade_letter', 2)->nullable();
            $table->timestamps();
        });

        // 4. Student Uploaded Documents Table
        Schema::create('student_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('document_name');
            $table->string('file_path');
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->text('admin_feedback')->nullable();
            $table->timestamps();
        });

        // 5. Live Classes Table (links for Zoom, Google Meet, WhatsApp, or Classroom details)
        Schema::create('live_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('platform'); // Zoom, Google Meet, WhatsApp, On-Campus
            $table->string('join_url')->nullable();
            $table->string('classroom_details')->nullable();
            $table->dateTime('scheduled_at');
            $table->timestamps();
        });

        // 6. Timetables Table
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_path');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 7. Announcements Table
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('priority')->default('normal'); // normal, high, critical
            $table->timestamps();
        });

        // 8. Digital Library/Books Table
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('category');
            $table->string('file_path');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping child tables first to avoid foreign key constraint issues
        Schema::dropIfExists('books');
        Schema::dropIfExists('announcements');
        Schema::dropIfExists('timetables');
        Schema::dropIfExists('live_classes');
        Schema::dropIfExists('student_documents');
        Schema::dropIfExists('grades');
        Schema::dropIfExists('enrollments');
        Schema::dropIfExists('courses');
    }
};