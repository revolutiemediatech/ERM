<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekolahModel extends Model
{
    use HasFactory;

    protected $table = 'm_sekolah';
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
}
