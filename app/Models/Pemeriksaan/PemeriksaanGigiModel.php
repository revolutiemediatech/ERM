<?php

namespace App\Models\Pemeriksaan;

use App\Models\FaskesModel;
use App\Models\SekolahModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaanGigiModel extends Model
{
    use HasFactory;

    protected $table = 'answer_gigi';
    protected $guarded = ['id'];
    protected $dates    = ['deleted_at'];

    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }

    public function sekolah()
    { 
        return $this->belongsTo(SekolahModel::class, 'idSekolah', 'id');
    }
}
