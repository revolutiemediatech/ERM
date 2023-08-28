<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinsiModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'm_provinsi';
    protected $guarded = ['id']; 
}
