<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecamatanModel extends Model
{
    use HasFactory;
    protected $table = 'm_kecamatan';
    protected $guarded = ['id'];

    public function provinsi()
    { 
        return $this->belongsTo(ProvinsiModel::class, 'idMProvinsi', 'id');
    }

    public function daerah()
    { 
        return $this->belongsTo(DaerahModel::class, 'idMDaerah', 'id');
    }
}
