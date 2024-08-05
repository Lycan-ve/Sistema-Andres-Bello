<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use App\Models\Reclamo;
use App\Models\Persona;
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
        $reclamos = Reclamo::all();
        $libros = Libro::all();
        $matricula = Matricula::all();
        $seccion = Seccion::all();
        $ano_academico = Ano_Academico::all();
        $persona = Persona::all();
        return view('Reclamos.index', compact('reclamos', 'libros', 'matricula', 'seccion', 'ano_academico','persona'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        notify()->error('Verifique bien Las Caracteristicas antes de hacer un Reclamo', 'ERROR AL RECLAMAR');

        $data = $request->validate([
            'id_libros' => 'required',
            'id_ano_academico' => 'required',
            'nombre' => 'required',
            'cedula' => 'nullable',
            'id_ano_academico' => 'required',
            'id_matricula' => 'required',
            'id_seccion' => 'required',
        ]);

        $libroId = $request->input('id_libros');
        $cantidad = $request->input('cantidad');

       $libro = Libro::find($libroId);
       if ($libro->cantidad >= $cantidad) {
           $libro->cantidad -= $cantidad;
           $libro->save();

    }

        Reclamo::create([
            'id_libros'=> $libroId,
            'id_ano_academico' => $data['id_ano_academico'],
            'cantidad' => $cantidad
        ]);

        Persona::create([
        'nombre' => $data['nombre'],
        'cedula' => $data['cedula'],
        'id_matricula' => $data['id_matricula'],
        'id_seccion' => $data['id_seccion'],
        ]);

        notify()->success('El Reclamo Se ha Realizado Satisfactoriamente', 'RECLAMO REALIZADO');
        return redirect()->route('Reclamos.index');

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
