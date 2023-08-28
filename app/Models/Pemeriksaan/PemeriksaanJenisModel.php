<?php

namespace App\Models\Pemeriksaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaanJenisModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pemeriksaan_jenis';
    protected $guarded = ['id'];

    public function responden()
    { 
        return $this->hasMany(PemeriksaanModel::class, 'pemeriksaan_pertanyaan_id', 'id');
    }

    public function pertanyaan()
    { 
        return $this->hasMany(PemeriksaanPertanyaanModel::class, 'pemeriksaan_pertanyaan_id', 'id');
    }

    public function jawaban()
    { 
        return $this->hasMany(PemeriksaanJawabanModel::class, 'pemeriksaan_pertanyaan_id', 'id');
    }
}
