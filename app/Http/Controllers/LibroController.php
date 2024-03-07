<?php

namespace App\Http\Controllers;

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

    function __construct()
    {
        $this->middleware(['permission:libro-list|libro-create|libro-edit|libro-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:libro-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:libro-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:libro-delete'], ['only' => ['destroy']]);
    }
    
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
        return view('libros.index ', $data, compact('libros', 'anos_academicos', 'asignaturas'));
    }

    public function create()
    {
        return view('libros.create');
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

        Libro::create($request->all());

        notify()->success('El Libro se ha Agregado Satisfactoriamente', 'LIBRO AGREGADO');
        return redirect()->route('libros.index');
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
