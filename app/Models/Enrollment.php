<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    protected $fillable = ['user_id', 'course_id', 'status', 'progress_percentage', 'payment_status', 'outstanding_balance', 'last_payment_at'];

    protected function casts(): array
    {
        return [
            'outstanding_balance' => 'decimal:2',
            'last_payment_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}