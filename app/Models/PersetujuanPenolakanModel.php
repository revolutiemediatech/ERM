<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersetujuanPenolakanModel extends Model
{
    use HasFactory;
    protected $table = 'persetujuan_penolakan';
    protected $guarded = ['id'];

    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }
    
    public function dokter()
    { 
        return $this->belongsTo(UserModel::class, 'idUsers', 'id');
    }
}
