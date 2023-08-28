<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiSatuSehatModel extends Model
{
    use HasFactory;
    protected $table = 'api_satuSehat';
    protected $guarded = ['id'];
    
    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
    
    public function users()
    { 
        return $this->belongsTo(UserModel::class, 'idMUsers', 'id');
    }
}
