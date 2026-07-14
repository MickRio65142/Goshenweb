<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LiveClass extends Model
{
    protected $table = 'live_classes';

    protected $fillable = ['course_id', 'platform', 'join_url', 'classroom_details', 'scheduled_at', 'end_time'];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}