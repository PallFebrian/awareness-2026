<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhishingSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_code',
        'simulated_email',
        'password_masked',
        'password_length',
        'format_valid',
        'submitted_at',
    ];

    protected function casts(): array
    {
        return [
            'password_length' => 'integer',
            'format_valid' => 'boolean',
            'submitted_at' => 'datetime',
        ];
    }
}