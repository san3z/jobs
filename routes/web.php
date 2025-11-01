<?php

use App\Http\Controllers\VacancyContoller;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
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

Route::resource('/vacancies', VacancyContoller::class);

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

Route::get('/vacancies/create', function(Vacancy $vacancy): View {
    return view('vacancies.create', compact('vacancy'));
});

Route::post('/vacancies/store', [VacancyContoller::class, 'store'])
->name('vacancies.store');

Route::delete('/vacancies/{vacancy}', [VacancyContoller::class, 'destroy'])
->name('vacancies.destroy');

Route::get('/vacancies/{vacancy}/edit', [VacancyContoller::class, 'edit'])
->name('vacancies.edit');

Route::patch('/vacancies/{vacancy}', [VacancyContoller::class, 'update'])
->name('vacancies.update');

