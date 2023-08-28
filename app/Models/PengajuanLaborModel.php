<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanLaborModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'pengajuan_labor';
    protected $guarded = ['id']; 
    
    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }

    public function labor()
    { 
        return $this->belongsTo(DataLaborModel::class, 'idLabor', 'id');
    }
    
    public function pembiayaann()
    { 
        return $this->belongsTo(JenisPasienModel::class, 'pembiayaan', 'id');
    }
}
