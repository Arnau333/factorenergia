<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function  QuestionIsExist($request)  {

        $Questionobj = Question::where('Tagged', $request->Tagged)
                        ->where('Todate', $request->Todate)
                        ->where('Fromdate', $request->Fromdate)
                        ->first();

    return isset($Questionobj->response) ?? false;


    }

    public static function  createQuestion($request, $response)  {
        $newQuestion = new Question;

        $newQuestion->Tagged = $request->Tagged ?? "";
        $newQuestion->Todate = $request->Todate;
        $newQuestion->Fromdate = $request->Fromdate;
        $newQuestion->response = $response;

        $newQuestion->save();
    }





}
