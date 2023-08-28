<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutofillModel extends Model
{
    use HasFactory;
    protected $table = 'autofill_custom';
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'idMUsers',
    //     'nama',
    //     'eye',
    //     'verbal',
    //     'motorik',
    //     'keadaan_umum',
    //     'td1',
    //     'td2',
    //     'hr',
    //     'rr',
    //     'suhu',
    //     'spo2',
    //     'bb',
    //     'tb',
    //     'ca1',
    //     'ca2',
    //     'si1',
    //     'si2',
    //     'rc1',
    //     'rc2',
    //     's1-2',
    //     'murmur1',
    //     'murmur2',
    //     'gallop1',
    //     'gallop2',
    //     'sdv1',
    //     'sdv2',
    //     'rh1',
    //     'rh2',
    //     'wh1',
    //     'wh2',
    //     'retraksi1',
    //     'retraksi2',
    //     'kontur',
    //     'defans',
    //     'bu1',
    //     'bu2',
    //     'nt1',
    //     'nt2',
    //     'crt',
    //     'akral',
    //     'edema1',
    //     'edema2',
    //     'status_lokalis',
    //     'status',
    // ];

    public function users()
    { 
        return $this->belongsTo(UserModel::class, 'idMUsers', 'id');
    }

    public function select()
    { 
        return $this->belongsTo(AutofillSelect::class, 'urut', 'id');
    }
}
