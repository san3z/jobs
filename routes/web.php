<?php

use App\Http\Controllers\VacancyContoller;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Models\Vacancy;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';

Route::get('/vacancies',  function () 
{
    $vacancies = Vacancy::all();
    #return Vacancy::all();
    return View('vacancies.index', ['vacancies' => $vacancies]);
});

Route::get('/vacancies/{vacancy}', function (Vacancy $vacancy): Illuminate\View\View {
    return view('vacancies.show', compact('vacancy'));
    #return $vacancy;
});