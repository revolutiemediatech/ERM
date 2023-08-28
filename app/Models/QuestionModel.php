<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionModel extends Model
{
    use HasFactory;
    protected $table = 'question_soal';
    protected $fillable = [
        'pertanyaan',
        'idQUser',
        'idQSTipe',
    ];
    protected $dates    = ['deleted_at'];

    public static function getQuestion()
    {
        // SELECT
        // qs.`id`, qs.`idQUser`, qs.`idQSTipe`, qu.`nama` AS nama_responden, qst.`namaTipe` AS nama_tipe, qs.`pertanyaan`
        // FROM question_soal AS qs
        // JOIN question_user AS qu ON qu.`id` = qs.`idQUser`
        // JOIN question_soalTipe AS qst ON qst.`id` = qs.`idQSTipe`
        $query  = DB::table('question_soal AS qs');
        $query->selectRaw('qs.`id`, qs.`idQUser`, qs.`idQSTipe`, qu.`nama` AS nama_responden, qst.`namaTipe` AS nama_tipe, qs.`pertanyaan`');
        $query->join('question_user AS qu', 'qu.id', '=', 'qs.idQUser');
        $query->join('question_soalTipe AS qst', 'qst.id', '=', 'qs.idQSTipe');
        return $query;
    }

    public static function getQuestionTipe($idQSUser = null)
    {
        // SELECT
        // qs.`id`, qs.`idQSTipe`, qs.`pertanyaan`, qst.`namaTipe` AS nama_tipe
        // FROM question_soal AS qs
        // JOIN question_soalTipe AS qst ON qst.`id` = qs.`idQSTipe`
        // WHERE qs.`idQUser` = '1'
        $query  = DB::table('question_soal AS qs');
        $query->selectRaw('qs.`id`, qs.`idQSTipe`, qs.`pertanyaan`, qst.`namaTipe` AS nama_tipe');
        $query->join('question_soalTipe AS qst', 'qst.id', '=', 'qs.idQSTipe');
        $query->where('qs.idQUSer', $idQSUser);
        return $query;
    }
}