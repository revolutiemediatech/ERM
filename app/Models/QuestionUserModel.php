<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionUserModel extends Model
{
    use HasFactory;
    protected $table = 'question_userData';
    protected $fillable = [
        'idQUser', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'no_hp', 'idSekolah', 'idKelas',
        'kki1', 'kki2', 'kki3', 'kki4', 'kki5', 'kki6', 'kki7', 'kki8', 'kki9', 'kki10', 'kki11', 'kki12',
        'kki13', 'kki14', 'kki15', 'kki16', 'kki17', 'kki18', 'kki19', 'kki20', 'kki21', 'kki22', 'kki23', 'kki24',
        'kki_do1', 'kki_do2', 'kki_do3', 'kki_do4', 'kki_do5', 'kki_do6', 'kki_do7', 'kki_do8', 'kki_do9', 'kki_do10',
        'kki_do11', 'kki_do12', 'kki_do13', 'kki_do14', 'kki_do15', 'kki_do16', 'kki_do17', 'kki_do18', 'kki_do19', 'kki_do20',
        'idMGoldar', 'idMRhesus', 'jenDis', 'riwImDas', 'apKamSar', 'apKamJajSek', 'apKamMer', 'apOrAl', 'kesRep'
    ];
    protected $dates    = ['deleted_at'];
    public function getTanggalLahirAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_lahir'])
        ->format('d M Y');
    }
    public static function getAnswerQuestion($idQuserData = null)
    {
        // SELECT
        // qj.`id`, qj.`idQUser`, qj.`idQSoal`, qj.`idQSTipe`, qs.`pertanyaan` AS nama_pertanyaan, qj.`namaJawaban` AS nama_jawaban
        // FROM question_jawaban AS qj
        // JOIN question_soal AS qs ON qs.`id` = qj.`idQSoal`
        // WHERE qj.`idQUserData` = '1'
        $query = DB::table('question_jawaban AS qj');
        $query->selectRaw('qj.`id`, qj.`idQUser`, qj.`idQSoal`, qj.`idQSTipe`, qs.`pertanyaan` AS nama_pertanyaan, qj.`namaJawaban` AS nama_jawaban');
        $query->join('question_soal AS qs', 'qs.id', '=', 'qj.idQSoal');
        $query->where('qj.idQUserData', $idQuserData);
        return $query;
    }
    public function sekolah()
    { 
        return $this->belongsTo(SekolahModel::class, 'idSekolah', 'id');
    }
    public function goldar()
    { 
        return $this->belongsTo(GoldarModel::class, 'idMGoldar', 'id');
    }
    
    public function kategori()
    { 
        return $this->belongsTo(QuestionPenerimaModel::class, 'idQUser', 'id');
    }

    public function rhesus()
    { 
        return $this->belongsTo(RhesusModel::class, 'idRhesus', 'id');
    }
}