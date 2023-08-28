<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitPelayananModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'm_unit_pelayanan';
    protected $guarded = ['id']; 
}
