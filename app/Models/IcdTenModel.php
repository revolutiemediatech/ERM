<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IcdTenModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'icd10';
    protected $guarded = ['id']; 
}
