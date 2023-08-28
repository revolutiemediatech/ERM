<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaerahModel extends Model
{
    use HasFactory;
    protected $table = 'm_daerah';
    protected $guarded = ['id'];

    public function provinsi()
    { 
        return $this->belongsTo(ProvinsiModel::class, 'idMProvinsi', 'id');
    }
}
