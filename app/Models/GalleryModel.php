<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'gallery';
    protected $guarded = ['id']; 
    
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('d M Y H:i');
    }
    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }
}
