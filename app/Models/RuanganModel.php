<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuanganModel extends Model
{
    use HasFactory;
    protected $table = 'm_ruangan';
    protected $guarded = ['id'];
    
    public function users()
    { 
        return $this->belongsTo(UserModel::class, 'idUsers', 'id');
    }

    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
}
