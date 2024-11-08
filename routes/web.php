<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ScoreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/newsubject', [SubjectController::class, 'index'])->name('subject.index');
Route::post('/newsubject', [SubjectController::class, 'store'])->name('subject.store');

Route::get('/newquestion', [QuestionController::class, 'create'])->name('question.create');
Route::post('/newquestion',[QuestionController::class, 'store'])->name('question.store');

Route::get('/question', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/question/{question}',[QuestionController::class,'show'])->name('question.show');
Route::put('/question/{question}',[QuestionController::class,'update'])->name('question.update');
Route::delete('/question/{question}',[QuestionController::class,'destroy'])->name('question.destroy');

Route::get('/tests', [TestController::class, 'index'])->name('tests.index');
Route::get('/tests/{test}',[TestController::class,'show'])->name('test.show');
Route::post('/tests/{test}',[ScoreController::class,'store'])->name('score.store');

