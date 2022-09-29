<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_number',
        'question_id',
        'correct',
    ];

    public function getQuestion()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
