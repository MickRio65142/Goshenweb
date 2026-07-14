<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    protected $fillable = [
        'title', 'description', 'course_id', 'course_slug', 'duration_minutes',
        'pass_score', 'max_attempts', 'shuffle_questions', 'is_active', 'reference_material',
    ];

    protected function casts(): array
    {
        return [
            'shuffle_questions' => 'boolean',
            'is_active' => 'boolean',
            'reference_material' => 'json',
        ];
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(ExamQuestion::class)->orderBy('sort_order');
    }

    public function attempts(): HasMany
    {
        return $this->hasMany(ExamAttempt::class);
    }
}
