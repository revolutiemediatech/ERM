<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPasienModel extends Model
{
    use HasFactory;
    protected $table = 'm_jenispasien';
    protected $guarded = ['id'];
}
