<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Reclamo;

class DashboardController extends Controller
{
    public function index()
    {
        $CantidadLibros = Libro::count();
        $CantidadReclamos = Reclamo::count();

        return view('dashboard', compact('CantidadLibros', 'CantidadReclamos'));
    }

}
