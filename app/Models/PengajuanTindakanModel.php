<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanTindakanModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'pengajuan_tindakan';
    protected $guarded = ['id']; 
    
    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }

    public function tindakanMedis()
    { 
        return $this->belongsTo(TindakanMedisModel::class, 'idTinMed', 'id');
    }
    
    public function pembiayaann()
    { 
        return $this->belongsTo(JenisPasienModel::class, 'pembiayaan', 'id');
    }
}
