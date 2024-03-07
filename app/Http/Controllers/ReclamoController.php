<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use App\Models\Reclamo;
use App\Models\Libro;
use App\Models\Matricula;
use App\Models\Ano_Academico;
use App\Models\Seccion;

use Illuminate\Http\Request;

class ReclamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $reclamos = Reclamo::where('nombre', 'LIKE','%'.$busqueda.'%')
                ->latest('id')
                ->paginate(10);
                
        $data = ['reclamos' => $reclamos];

        $reclamos = Reclamo::all();
        $libros = Libro::all();
        $matricula = Matricula::all();
        $seccion = Seccion::all();
        return view('Bibliotecario.Reclamo', $data, compact('reclamos', 'libros', 'matricula', 'seccion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        notify()->error('Verifique bien Las Caracteristicas antes de hacer un Reclamo', 'ERROR AL RECLAMAR');

        $validate = $request->validate([
            'id_libros' => 'required',
            'nombre' => 'required',
            'cedula' => 'required',
            'id_matricula' => 'required',
            'id_seccion' => 'required',
        ]);

        $reclamos=new Reclamo;
        $reclamos->id_libros=$request->input('id_libros');
        $reclamos->nombre=$request->input('nombre');
        $reclamos->cedula=$request->input('cedula');
        $reclamos->id_matricula=$request->input('id_matricula');
        $reclamos->id_seccion=$request->input('id_seccion');
        $reclamos->save();
        notify()->success('El Reclamo Se ha Realizado Satisfactoriamente', 'RECLAMO REALIZADO');
        return redirect()->route('reclamo');
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
