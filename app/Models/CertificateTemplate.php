<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CertificateTemplate extends Model
{
    protected $fillable = ['name', 'background_file', 'orientation', 'config', 'status'];

    protected function casts(): array
    {
        return [
            'config' => 'array',
        ];
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'certificate_template_id');
    }
}
