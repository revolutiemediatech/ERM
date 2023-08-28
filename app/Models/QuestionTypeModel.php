<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTypeModel extends Model
{
    use HasFactory;
    protected $table = 'question_soalTipe';
    protected $fillable = [
        'namaTipe',
    ];
    protected $dates    = ['deleted_at'];
}