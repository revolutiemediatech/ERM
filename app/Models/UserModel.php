<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'users';
    protected $guarded = ['id']; 
    
    public function role()
    { 
        return $this->belongsTo(RoleModel::class, 'idRole', 'id');
    }
    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
}
