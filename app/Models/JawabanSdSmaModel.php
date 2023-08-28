<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanSdSmaModel extends Model
{
    use HasFactory;

    protected $table = 'answer_sdSma';
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
