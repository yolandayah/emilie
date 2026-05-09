<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AsignaturaController extends Controller
{
    public function index(): View
    {
        $asignaturas = Asignatura::all();

        return view('grupos.index',compact('asignaturas'));
    }

    public function grupos(Asignatura $asignatura)
    {
        $asignatura->load('grupos.user:id,name,last_name');

        return view('grupos.grupos',compact('asignatura'));
    }

    public function alumnos(Grupo $grupo)
    {
        $users = $grupo->users;
        return view('grupos.alumnos',compact('users','grupo'));
    }

    public function create(): View
    {
        return view('grupos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $asignatura = $request->validate([
            'nombre' =>  'required|string|max:255|unique:asignaturas',
        ]);

        Asignatura::create($asignatura);

        return redirect()
                ->route('grupos.index')
                ->with('success','Se registro la asignatura "'.$request->nombre.'"');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignatura $asignatura)
    {
        return $asignatura;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAsignaturaRequest $request, Asignatura $asignatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura $asignatura)
    {
        //
    }
}
