<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use App\Models\Reclamo;
use App\Models\Persona;
use App\Models\Libro;
use App\Models\Matricula;
use App\Models\Ano_Academico;
use App\Models\Seccion;

use Carbon\Carbon;

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
            'cantidad' => 'required',
            'fecha_entrega' => 'required|in:3,5,7', // Asegúrate de que este campo esté en el formulario
        ]);

        // Crear o encontrar la persona
        $persona = Persona::firstOrCreate(
            ['cedula' => $data['cedula']],
            [
                'nombre' => $data['nombre'],
                'id_matricula' => $data['id_matricula'],
                'id_seccion' => $data['id_seccion']
            ]
        );

        $fechaEntrega = Carbon::now()->addDays($data['fecha_entrega']);
        $fechaTope = $fechaEntrega->copy()->addDays(1); // Un día después de la fecha de entrega

        $libro = Libro::findOrFail($data['id_libros']);

        if ($libro->cantidad < $data['cantidad']) {
            notify()->error('No hay suficientes libros disponibles', 'ERROR DE INVENTARIO');
            return redirect()->back();
        }

        Reclamo::create([
            'id_libros' => $data['id_libros'],
            'id_ano_academico' => $data['id_ano_academico'],
            'id_persona' => $persona->id,
            'cantidad' => $data['cantidad'],
            'fecha_entrega' => $fechaEntrega,
            'fecha_tope' => $fechaTope
        ]);

        $libro->cantidad -= $data['cantidad'];
        $libro->save();

        notify()->success('El Reclamo Se ha Realizado Satisfactoriamente', 'RECLAMO REALIZADO');
        return redirect()->route('Reclamos.index');

    }


            public function personasConReclamos()
        {
            $personas = Persona::whereHas('reclamos')->get(['id', 'nombre', 'cedula', 'id_matricula', 'id_seccion']);
            return response()->json($personas);
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
