<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentDocument extends Model
{
    protected $table = 'student_documents';

    protected $fillable = ['user_id', 'document_name', 'file_path', 'status', 'admin_feedback'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}