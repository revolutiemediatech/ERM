<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'm_pekerjaan';
    protected $guarded = ['id']; 
    
    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }
}