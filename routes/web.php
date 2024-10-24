<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/newsubject', [SubjectController::class, 'index'])->name('subject.index');
Route::post('/newsubject', [SubjectController::class, 'store'])->name('subject.store');

Route::get('/newquestion', [QuestionController::class, 'create'])->name('question.create');
Route::post('/newquestion',[QuestionController::class, 'store'])->name('question.store');

Route::get('/question', [QuestionController::class, 'index'])->name('questions.index');
