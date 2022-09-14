<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'original_id',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'answer',
        'qr_code',
    ];
}
