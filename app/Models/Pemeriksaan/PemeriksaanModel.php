<?php

namespace App\Models\Pemeriksaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaanModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pemeriksaan';
    protected $guarded = ['id'];

    public function jawaban()
    { 
        return $this->hasMany(PemeriksaanJawabanModel::class, 'pemeriksaan_id', 'id');
    }
}
