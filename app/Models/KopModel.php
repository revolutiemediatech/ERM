<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KopModel extends Model
{
    use HasFactory;
    protected $table = 'kop';
    protected $guarded = ['id'];
    
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('d M Y H:i');
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
