<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Grupo;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AsignaturaController extends Controller
{
    public function index(): View
    {
        $asignaturas = Asignatura::all();

        return view('grupos.index', compact('asignaturas'));
    }

    public function grupos(Asignatura $asignatura): View
    {
        $asignatura->load('grupos.user:id,name,last_name');

        return view('grupos.grupos', compact('asignatura'));
    }

    public function alumnos(Grupo $grupo): View
    {
        $users = $grupo->users;

        return view('grupos.alumnos', compact('users', 'grupo'));
    }

    public function create(): View
    {
        return view('grupos.create');
    }

    public function createGrupo(Asignatura $asignatura): View
    {
        $users = User::role('Maestro')
            ->select('id', 'name', 'last_name')
            ->get();

        return view('grupos.creategrupo', compact('asignatura', 'users'));
    }

    public function storeGrupo(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'asignatura_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        Grupo::create([
            'nombre' => $request->nombre,
            'archivar' => false,
            'asignatura_id' => $request->asignatura_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()
            ->route('grupos.lista', ['asignatura' => $request->asignatura_id])
            ->with('success', 'Se registro el grupo "'.$request->nombre.'"');
    }

    public function store(Request $request): RedirectResponse
    {
        $asignatura = $request->validate([
            'nombre' => 'required|string|max:255|unique:asignaturas',
        ]);

        Asignatura::create($asignatura);

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Se registro la asignatura "'.$request->nombre.'"');
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

    public function destroy(Asignatura $asignatura): RedirectResponse
    {
        if ($asignatura->delete()) {
            return redirect()
                ->route('grupos.index')
                ->with('success', 'Se elimino la asignatura "'.$asignatura->nombre.'"');
        }

        return redirect()
            ->route('grupos.index')
            ->with('error', 'Hubo un error a la hora de eliminar la asignatura "'.$asignatura->nombre.'"');
    }
}
