<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedModel extends Model
{
    use HasFactory;
    protected $table = 'm_bed';
    protected $guarded = ['id'];
    
    public function kamar()
    { 
        return $this->belongsTo(KamarModel::class, 'idKamar', 'id');
    }

    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
    
    public function lokasiPemeriksaan()
    { 
        return $this->belongsTo(LokasiModel::class, 'idLokasiPemeriksaan', 'id');
    }
}
