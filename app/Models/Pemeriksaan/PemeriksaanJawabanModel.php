<?php

namespace App\Models\Pemeriksaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaanJawabanModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pemeriksaan_jawaban';
    protected $guarded = ['id'];
}
