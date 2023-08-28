<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanAssesmentModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'pengajuan_assesment';
    protected $guarded = ['id']; 
    
    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }
    public function icdTen()
    { 
        return $this->belongsTo(IcdTenModel::class, 'idIcdTen', 'id');
    }
}
