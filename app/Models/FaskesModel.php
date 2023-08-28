<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaskesModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'm_mitrafaskes';
    protected $guarded = ['id']; 
    
    public function provinsi()
    { 
        return $this->belongsTo(ProvinsiModel::class, 'idMProvinsi', 'id');
    }

    public function daerah()
    { 
        return $this->belongsTo(DaerahModel::class, 'idMDaerah', 'id');
    }

    public function kecamatan()
    { 
        return $this->belongsTo(KecamatanModel::class, 'idMKecamatan', 'id');
    }

    public function desa()
    { 
        return $this->belongsTo(DesaModel::class, 'idMDesa', 'id');
    }
}
