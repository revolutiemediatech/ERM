<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPenerimaModel extends Model
{
    use HasFactory;
    protected $table = 'question_user';
    protected $fillable = [
        'nama',
        'versi',
        'status',
    ];
    protected $dates    = ['deleted_at'];
    
    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
}