<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Libro;
use App\Models\Ano_Academico;
use App\Models\Asignatura;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
    $busqueda = $request->get('busqueda');

    $libros = Libro::where(function($query) use ($busqueda) {
        $query->where('titulo', 'LIKE', '%'.$busqueda.'%')
            ->orWhereHas('asignaturas', function($q) use ($busqueda) {
                $q->where('nombre', 'LIKE', '%'.$busqueda.'%');
            })
            ->orWhereHas('ano_academico', function($q) use ($busqueda) {
                $q->where('nombre', 'LIKE', '%'.$busqueda.'%');
            });
    })->paginate(10);

    $anos_academicos = Ano_Academico::all();
    $asignaturas = Asignatura::all();

    return view('libros.index', compact('libros', 'anos_academicos', 'asignaturas'));
}

    public function create()
    {
        //
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
            'id_asignatura' => 'required',
            'cantidad' => 'required',
        ]);
        Libro::create($request->all());

        notify()->success('El Libro se ha Agregado Satisfactoriamente', 'LIBRO AGREGADO');
        return redirect()->route('Libros.index');
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
        notify()->error('', 'ERROR AL EDITAR EL LIBRO');

        $this->validate($request, [
            'titulo' => 'required',
            'id_ano_academico' => 'required',
            'id_asignatura' => 'required',
            'cantidad' => 'required'
        ]);


        $input = $request->all();
        $libro = Libro::find($id);
        $libro->update($input);
        notify()->success('El Libro se ha Editado Satisfactoriamente', 'LIBRO EDITADO');

        return redirect()->route('Libros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("libros")->where('id', $id)->delete();
        notify()->success('El Libro se ha Eliminado Satisfactoriamente','LIBRO ELIMINADO');
        return redirect()->route('Libros.index');
    }

}
