<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnswerModel extends Model
{
    use HasFactory;
    protected $table = 'question_jawaban';
    protected $fillable = [
        'idQUserData',
        'idQUser',
        'idQSoal',
        'idQSTipe',
        'namaJawaban',
    ];
    protected $dates    = ['deleted_at'];

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
}