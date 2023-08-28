<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecordModel extends Model
{
    use HasFactory;
    protected $table = 'medical_record';
    protected $guarded = ['id'];
    
    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }

    public function desa()
    { 
        return $this->belongsTo(DesaModel::class, 'idMDesa', 'id');
    }
}
