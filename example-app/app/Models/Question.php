<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class Question extends Model
{
    use HasFactory;
    protected $table = 'Question';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Tagged',   //string
        'Todate',   //date
        'Fromdate', //date
        'response'  //json
    ];

    public static function  QuestionIsExist($request)
    {

        $question = Question::where('Tagged', $request->Tagged)
            ->where('Todate', isset($request->Todate) && $request->Todate != "" ? $request->Todate : null)
            ->where('Fromdate', isset($request->Fromdate) && $request->Fromdate != "" ? $request->Fromdate : null)
            ->first();
        return isset($question->response) ? $question->response : false;
    }

    public static function  createQuestion($request, $response)
    {
        $newQuestion = new Question;

        $newQuestion->Tagged = $request->Tagged ?? "";
        $newQuestion->Todate = isset($request->Todate) && $request->Todate != "" ? $request->Todate : null;
        $newQuestion->Fromdate = isset($request->Fromdate) && $request->Fromdate != "" ? $request->Fromdate : null;
        $newQuestion->response = $response;

        $newQuestion->save();

        return true;
    }

    public static function listQuestion()
    {

        return json_decode(Question::orderBy('id', 'desc')->limit(100)->get()) ?? [];
    }
}
