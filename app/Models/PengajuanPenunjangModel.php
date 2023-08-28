<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPenunjangModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'pengajuan_penunjang';
    protected $guarded = ['id']; 
    
    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }

    public function penunjang()
    { 
        return $this->belongsTo(PenunjangModel::class, 'idPenunjang', 'id');
    }
    
    public function pembiayaann()
    { 
        return $this->belongsTo(JenisPasienModel::class, 'pembiayaan', 'id');
    }
}
