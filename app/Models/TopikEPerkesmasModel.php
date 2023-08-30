<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopikEPerkesmasModel extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'topik_ePerkesmas';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(UserModel::class, 'idUsers', 'id');
    }
    public function faskes()
    {
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
    public function penanggungjawab()
    {
        return $this->belongsTo(UserModel::class, 'idPenanggungJawab', 'id');
    }
}
