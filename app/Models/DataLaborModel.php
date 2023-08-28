<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLaborModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'labor';
    protected $guarded = ['id']; 
    
    public function diagnosa()
    { 
        return $this->belongsTo(DiagnosaModel::class, 'idDiagnosa', 'id');
    }
    
    public function lokasiPemeriksaan()
    { 
        return $this->belongsTo(LokasiModel::class, 'idLokasiPemeriksaan', 'id');
    }
    
    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
    
    public function pembiayaann()
    { 
        return $this->belongsTo(JenisPasienModel::class, 'pembiayaan', 'id');
    }
}
