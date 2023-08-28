<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldarModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'm_golongandarah';
    protected $guarded = ['id']; 
}