<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
     public function index(){
          $questions = Question::all();
          return view('questions.index', compact('questions'));
     } 

   public function create(){
        $subjects = Subject::all();
        return view('questions.create',compact('subjects'));
   }

   public function store(Request $request){
        $request->validate([
            'subject_id' => 'required|integer|exists:subjects,id',
            'question_text' => 'required|string|max:255',
            'answer' => 'required|array|min:2',
            'answer.*.is_correct' => 'boolean|min:1',
            'answer.*.answer_text' => 'string|max:255'
        ]);

        $question = Question::create([
          'question_text' => $request->input('question_text'),
          'subject_id' => $request->input('subject_id')
        ]);

        foreach ($request->input('answer') as $answerData){
          if(!empty($answerData['answer'])){
               Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['answer'],
                    'is_correct' => $answerData['is_correct']
               ]);
          }
        }

        return redirect()->back()->with('success', 'Az új kérdést létrehozta!😁');
   }

   public function show(Question $question){
     $subjects = Subject::all();
     return view('questions.edit',compact('question','subjects'));
   }
}
