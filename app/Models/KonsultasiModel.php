<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiModel extends Model
{
    use HasFactory;
    protected $table = 'konsultasi_eKonsultasi';
    protected $guarded = ['id'];
    
    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
    public function topik()
    { 
        return $this->belongsTo(TopikEKonsultasiModel::class, 'idTopik', 'id');
    }
    public function users()
    { 
        return $this->belongsTo(UserModel::class, 'idUsers', 'id');
    }
}
