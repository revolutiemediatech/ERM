<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'm_kunjungansakit';
    protected $guarded = ['id']; 
}