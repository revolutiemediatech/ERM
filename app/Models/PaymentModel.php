<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;
    
    // Nama tabel
    protected $table = 'payment';
    protected $guarded = ['id']; 
    
    public function pasien()
    { 
        return $this->belongsTo(PasienModel::class, 'idMPasien', 'id');
    }
    
    public function pembayaran()
    { 
        return $this->belongsTo(BillingModel::class, 'idBilling', 'id');
    }
}
