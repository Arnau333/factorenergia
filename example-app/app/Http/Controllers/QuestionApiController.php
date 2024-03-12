<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\Question;

class QuestionApiController extends Controller
{
    function makeRequest(Request $request)
    {


        //existe?
         Question::QuestionIsExist($request);







        $Tagged = $request->query('Tagged');
        $Todate = $request->query('Todate');
        $Fromdate = $request->query('Fromdate');

        $Todate = $Todate ? Carbon::createFromFormat('Y-m-d H:i:s', $Todate . "01:00:00", "Europe/Madrid") : "";
        $Fromdate = $Fromdate ? Carbon::createFromFormat('Y-m-d H:i:s', $Fromdate . "01:00:00", "Europe/Madrid") : "";

        $Todate = $Todate ? $Todate->timestamp : "";
        $Fromdate = $Fromdate ? $Fromdate->timestamp : "";


        $response = Http::get('https://api.stackexchange.com/2.3/questions?page=1&fromdate=' . $Fromdate . '&todate=' . $Todate . '&order=desc&sort=activity&tagged=' . $Tagged . '&site=stackoverflow');

        if ($response->ok()) {
            // $response = $response->json();

            Question::createQuestion($request, $response);

            return $response;
        } else {
            dd('ERROR');
        }

                //crear


    }
}
