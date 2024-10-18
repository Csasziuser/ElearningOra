<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(){
        return view('subjects.create');
    }

    public function store(Request $request){
        $request->validate([
            'subject_name' => 'required|string|max:255',
        ]);
        Subject::create($request->all());
    }
}
