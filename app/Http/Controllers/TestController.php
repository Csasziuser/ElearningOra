<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class TestController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('test.index', compact('subjects'));
    }

    public function show($subject_name){
        $subject = Subject::where('subject_name', $subject_name)->first();

        $questions = $subject->questions;

        return view('test.show', compact('subject', 'questions'));
    }
}
