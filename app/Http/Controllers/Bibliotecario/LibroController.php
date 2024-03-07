<?php

namespace App\Http\Controllers\Bibliotecario;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use App\Models\Libro;
use App\Models\Ano_Academico;
use App\Models\Asignatura;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $libros = Libro::where('titulo', 'LIKE','%'.$busqueda.'%')
                ->latest('id')
                ->paginate(10);
        $data = ['libros' => $libros,];

        $libros = Libro::all();
        $anos_academicos = Ano_Academico::all();
        $asignaturas = Asignatura::all();
        return view('Bibliotecario.Libros', $data, compact('libros', 'anos_academicos', 'asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        notify()->error('Verifique bien Las Caracteristicas antes de Agregar un Libro', 'ERROR AL AGREGAR LIBRO');
        $validated = $request->validate([
            'titulo' => 'required',
            'id_ano_academico' => 'required',
            'id_asignatura' => 'required'
        ]);

        $libros=new Libro;
        $libros->titulo=$request->input('titulo');
        $libros->id_ano_academico=$request->input('id_ano_academico');
        $libros->id_asignatura=$request->input('id_asignatura');
        $libros->save();
        notify()->success('El Libro se ha Agregado Satisfactoriamente', 'LIBRO AGREGADO');
        return redirect()->route('libros');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
