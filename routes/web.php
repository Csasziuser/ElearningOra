<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/newsubject', [SubjectController::class, 'index'])->name('subject.index');
Route::post('newsubject', [SubjectController::class, 'store'])->name('subject.store');

