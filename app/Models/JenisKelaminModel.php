<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelaminModel extends Model
{
    use HasFactory;

    protected $table = 'm_jeniskelamin';
    protected $guarded = ['id']; 
}
