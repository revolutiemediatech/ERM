<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PasienModel extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $guarded = ['id'];
    protected $casts = [
        'idMPekerjaan' => 'array',
    ];
    
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('d M Y H:i');
    }

    public function getTanggalLahirAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_lahir'])
        ->format('d M Y');
    }

    public function faskes()
    { 
        return $this->belongsTo(FaskesModel::class, 'idFaskes', 'id');
    }

    public function provinsi()
    { 
        return $this->belongsTo(ProvinsiModel::class, 'idMProvinsi', 'id');
    }

    public function daerah()
    { 
        return $this->belongsTo(DaerahModel::class, 'idMDaerah', 'id');
    }

    public function kecamatan()
    { 
        return $this->belongsTo(KecamatanModel::class, 'idMKecamatan', 'id');
    }

    public function desa()
    { 
        return $this->belongsTo(DesaModel::class, 'idMDesa', 'id');
    }

    public function lokasiPemeriksaan()
    { 
        return $this->belongsTo(LokasiModel::class, 'idLokasiPemeriksaan', 'id');
    }

    public function perawatan()
    { 
        return $this->belongsTo(PerawatanModel::class, 'idMPerawatan', 'id');
    }

    public function unitPelayanan()
    { 
        return $this->belongsTo(UnitPelayananModel::class, 'idMUnitPelayanan', 'id');
    }

    public function kunjunganSakit()
    { 
        return $this->belongsTo(KunjunganModel::class, 'idMKunjunganSakit', 'id');
    }

    public function jenisKelamin()
    { 
        return $this->belongsTo(JenisKelaminModel::class, 'idMJenisKel', 'id');
    }

    public function goldar()
    { 
        return $this->belongsTo(GoldarModel::class, 'idMGoldar', 'id');
    }

    public function rhesus()
    { 
        return $this->belongsTo(RhesusModel::class, 'idRhesus', 'id');
    }

    public function pendidikan()
    { 
        return $this->belongsTo(PendidikanModel::class, 'idMPendidikan', 'id');
    }

    public function pekerjaan()
    { 
        return $this->belongsTo(PekerjaanModel::class, 'idMPekerjaan', 'id');
    }

    public function jenisPasien()
    { 
        return $this->belongsTo(JenisPasienModel::class, 'idMJenisPas', 'id');
    }
    
    public function kamar()
    { 
        return $this->belongsTo(KamarModel::class, 'idKamar', 'id');
    }
    
    public function bed()
    { 
        return $this->belongsTo(BedModel::class, 'idBed', 'id');
    }
    public function statusKel()
    { 
        return $this->belongsTo(StatusKeluargaModel::class, 'idStatusKel', 'id');
    }

    public function jenisAdmin()
    { 
        return $this->belongsTo(AdministrasiModel::class, 'idMJenisPas', 'idPembiayaan');
    }

    public function biayaLabor()
    { 
        return $this->hasMany(PengajuanLaborModel::class, 'idMPasien', 'id');
    }

    public function biayaPenunjang()
    { 
        return $this->hasMany(PengajuanPenunjangModel::class, 'idMPasien', 'id');
    }

    public function biayaTindakan()
    { 
        return $this->hasMany(PengajuanTindakanModel::class, 'idMPasien', 'id');
    }

    public function biayaAssesment()
    { 
        return $this->hasMany(PengajuanAssesmentModel::class, 'idMPasien', 'id');
    }
}
