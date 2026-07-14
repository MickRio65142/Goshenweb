<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamRegistration extends Model
{
    protected $fillable = [
        'exam_attempt_id', 'name', 'email', 'phone', 'address',
        'course_slug', 'token', 'registered',
    ];

    protected function casts(): array
    {
        return [
            'registered' => 'boolean',
        ];
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class);
    }
}
