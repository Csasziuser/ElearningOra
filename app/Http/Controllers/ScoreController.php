<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Score;

class ScoreController extends Controller
{
    public function store(Request $request, $subject_name){
        //1. Ellenőrizni kell, hogy az e-mail és tantárgy szerepel-e az adatbázisban.
        $subject = Subject::where('subject_name', $subject_name)->first();
        $newTest = Score::where('e-mail', $request->email)
                        ->where('subject_id',$subject->id)->first();

        if($newTest){
            return redirect()->back()->with('error','Már kitöltötted a tesztet!');
        }


        //2. Ellenőrizni kell, hogy minden kérdésre adott-e  a választ a felhasználó.

        //3. Meg kell vizsgálni, hogy helyes választ adott-e a felhasználó.

        //4. A megszerzett pontszámot eltároljuk az adatbázisban
    }
}
