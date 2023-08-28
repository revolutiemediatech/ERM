<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingModel extends Model
{
    use HasFactory;
    protected $table = 'billing';
    protected $guarded = ['id'];
    
    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
    
    public function lokasiPemeriksaan()
    { 
        return $this->belongsTo(LokasiModel::class, 'idLokasiPemeriksaan', 'id');
    }

    public function pembiayaan()
    { 
        return $this->belongsTo(JenisPasienModel::class, 'idPembiayaan', 'id');
    }
    
    public function users()
    { 
        return $this->belongsTo(UserModel::class, 'idUsers', 'id');
    }
}
