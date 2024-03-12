<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\Question;

use function PHPUnit\Framework\isNull;

class QuestionApiController extends Controller
{
    function makeRequest(Request $request)
    {


        if ($response = Question::QuestionIsExist($request)) {
            return json_decode($response);
        } else {
            $Tagged = $request->query('Tagged');
            $Todate = $request->query('Todate') != "null" ? $request->query('Todate') : null;
            $Fromdate = $request->query('Fromdate') != "null" ? $request->query('Fromdate') : null;

            if (!isNull($Todate)) {
                $Todate =  Carbon::createFromFormat('Y-m-d H:i:s', $Todate . "01:00:00", "Europe/Madrid");
                $Todate =   $Todate->timestamp;
            } else {
                $Todate = "";
            }

            if (!isNull($Fromdate)) {
                $Fromdate = Carbon::createFromFormat('Y-m-d H:i:s', $Fromdate . "01:00:00", "Europe/Madrid");
                $Fromdate = $Fromdate->timestamp;
            } else {
                $Fromdate = "";
            }


            $response = Http::get('https://api.stackexchange.com/2.3/questions?page=1&fromdate=' . $Fromdate . '&todate=' . $Todate . '&order=desc&sort=activity&tagged=' . $Tagged . '&site=stackoverflow');

            if ($response->ok()) {

                Question::createQuestion($request, $response);

                return json_decode($response);
            } else {
                dd('ERROR');
            }
        }
    }

    function listequest()
    {
        return Question::listQuestion();
    }
}
