<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanDdtkModel extends Model
{
    use HasFactory;

    protected $table = 'answer_ddtk';
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
