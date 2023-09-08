<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunjunganPerkesmasModel extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kunjungan_eperkesmas';
    protected $guarded = ['id'];
    public function faskes()
    {
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }
    public function wilayah()
    {
        return $this->belongsTo(WilayahPerkesmasModel::class, 'idWilayah', 'id');
    }
}
