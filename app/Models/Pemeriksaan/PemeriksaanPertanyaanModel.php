<?php

namespace App\Models\Pemeriksaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaanPertanyaanModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pemeriksaan_pertanyaan';
    protected $guarded = ['id']; 

    public function pilihan()
    { 
        return $this->hasMany(PemeriksaanPilihanModel::class, 'pemeriksaan_pertanyaan_id', 'id');
    }
}
