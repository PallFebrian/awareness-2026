<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_code',
        'phase',
        'score',
        'total_questions',
        'percentage',
        'answers',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'score' => 'integer',
            'total_questions' => 'integer',
            'percentage' => 'decimal:2',
            'answers' => 'array',
            'completed_at' => 'datetime',
        ];
    }
}