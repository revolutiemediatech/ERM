<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKeluargaModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'status_keluarga';
    protected $guarded = ['id']; 
    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
}
