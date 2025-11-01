<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VacancyContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Vacancy $vacancy): View
    {
        $vacancies = Vacancy::all();
    return view('vacancies.index')->with('vacancies', $vacancies);
    #   $vacancies = Vacancy::all();
      # return $vacancies;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'about'=>'required|string',
        ]);

        Vacancy::create($validated);
        return redirect('/vacancies');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy): View
    {
        return view('vacancies.show', ['vacancy' => $vacancy]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
         $validated = $request->validate([
            'name'=>'required|string|max:255',
            'about'=>'required|string',
        ]);

        $vacancy->update($validated);
        return redirect('/vacancies');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect('/vacancies');
    }
}
