<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanObatModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'pengajuan_obat';
    protected $guarded = ['id']; 
    
    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }

    public function obat()
    { 
        return $this->belongsTo(ObatModel::class, 'idObat', 'id');
    }
    
    public function pembiayaann()
    { 
        return $this->belongsTo(JenisPasienModel::class, 'pembiayaan', 'id');
    }
}
