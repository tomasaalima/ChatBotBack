<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;
use Mockery\Undefined;

class KeywordsController extends Controller
{
    public function index($subject, $text)
    {
        $text = str_replace(['.', ',', ';', ':', '-', '_', '/', '\'', '"', '\\'], ' ', $text);
        $wordsArray = explode(" ", $text);

        $searches = new Collection();

        foreach($wordsArray as $word) {
            if  (strlen($word) > 3) {
                $search = Question::   where('pergunta','like', '%'.$word.'%')
                                    ->where('assunto', '=', $subject)
                                    ->select('pergunta', 'resposta')
                                    ->get();

                if (count($search) > 0) {
                    $searches->push($search);
                }
            }
        }



        return $searches->groupBy('pergunta')->flatten(2)->unique('pergunta')->values()->toArray();
    }
}
