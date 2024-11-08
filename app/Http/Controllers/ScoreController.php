<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Score;
use App\Models\Answer;
use Symfony\Component\Console\Logger\ConsoleLogger;

class ScoreController extends Controller
{
    public function store(Request $request, $subject_name){
        //1. Ellenőrizni kell, hogy az e-mail és tantárgy szerepel-e az adatbázisban (megoldotta-e már a tesztet).
        $subject = Subject::where('subject_name', $subject_name)->first();
        $newTest = Score::where('e-mail', $request->email)
                        ->where('subject_id',$subject->id)->first();

        if($newTest){
            return redirect()->back()->with('error','Már kitöltötted a tesztet!');
        }

        //2. Ellenőrizni kell, hogy minden kérdésre adott-e  a választ a felhasználó.
        $questions = $subject->questions;
        $answersGiven = $request->input('answers');
        if(!is_array($answersGiven) || count($answersGiven) != $questions->count()) 
        {
            //return redirect()->back()->with('error','Minden kérdésre válaszolni kell!');
            return redirect()->back()->with('error','Hiba lépett fel.');
        }

        $score = 0;

        //3. Meg kell vizsgálni, hogy helyes választ adott-e a felhasználó.
        foreach ($questions as $question) {
            $userAnswersIds = $answersGiven[$question->id] ?? [];

            if(is_array($userAnswersIds) && !empty($userAnswersIds)){
                //Lekérjük az összes helyes választ a kérdéshez
                $correctAnswers = Answer::where('question_id', $question->id)
                                        ->where('is_correct',true)
                                        ->pluck('id'); //csak az id-k kellenek

                // Összehasonlítjuk a felhasználó válaszokat és a helyes válaszokat
                foreach ($userAnswersIds as $userAnswersId) {
                    if($correctAnswers->contains($userAnswersId))
                    {
                        $score++;
                    }
                }
            }
            
        }

        //4. A megszerzett pontszámot eltároljuk az adatbázisban

        $score = Score::create([
            'e-mail' => $request->email,
            'subject_id' => $subject->id,
            'score' => $score,
        ]);

        return redirect()->route('score.show', ['score' => $score->id])
                        ->with('success', 'Sikeres tesztkitöltés.');
    }

    public function show($id){
        $score = Score::find($id);
        return view('score.show',compact('score'));
    }
}
