<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class QuestionController extends Controller
{
   public function create(){
        $subjects = Subject::all();
        return view('questions.create',compact('subjects'));
   }

   public function store(Request $request){
        $request->validate([
            'subject_id' => 'required|integer|exist:subjects,id',
            'question_text' => 'required|string|max:255',
            'answer' => 'required|array|min:2',
            'answer.*.is_correct' => 'boolean|min:1',
            'answer.*.answer_text' => 'string|max:255'
        ]);
   }
}
