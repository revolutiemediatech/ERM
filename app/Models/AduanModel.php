<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class AduanModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'aduan_eAduan';
    protected $guarded = ['id']; 
    
    
    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
        ->format('d M Y H:i');
    }

    public function users()
    {
        return $this->belongsTo(UserModel::class, 'idUsers', 'id');
    }
    public function faskes()
    {
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
}
