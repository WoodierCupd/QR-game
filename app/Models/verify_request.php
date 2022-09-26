<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verify_request extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_number',
        'question_id',
        'image_path',
        'open_answer',
    ];

    public function getQuestion()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');

    }
}
