<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosaModel extends Model
{
    use HasFactory;
    protected $table = 'diagnosa';
    protected $guarded = ['id'];
    protected $casts = [
        'idLabor' => 'array',
        'hasil_labor' => 'array',
    ];

    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }

    public function user()
    { 
        return $this->belongsTo(UserModel::class, 'idMUsers', 'id');
    }
    
    public function obat()
    { 
        return $this->belongsTo(ObatModel::class, 'idMObat', 'id');
    }

    public function unitPelayanan()
    { 
        return $this->belongsTo(UnitPelayananModel::class, 'idMUnitPelayanan', 'id');
    }

    public function labor()
    { 
        return $this->belongsTo(DataLaborModel::class, 'idLabor', 'id');
    }

    public function lokasiPemeriksaan()
    { 
        return $this->belongsTo(LokasiModel::class, 'idLokasiPemeriksaan', 'id');
    }
    
    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
}
