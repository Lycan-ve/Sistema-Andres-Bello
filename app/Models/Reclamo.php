<?php

namespace App\Models;

use App\Models\Libro;
use App\Models\Matricula;
use App\Models\Seccion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;

    protected $table='reclamo';
    protected $primaryKey="id";
    protected $fillable = ['id_libros', 'nombre', 'cedula', 'id_matricula', 'id_ano_academico' ,'id_seccion', 'fecha_tope'];
    public $timestamps = true;
    

    //Relacion uno a muchos (Inversa)

    public function libros(){
        return $this->belongsTo(Libro::class, 'id_libros');
    }

    public function matricula() {
        return $this->belongsTo(Matricula::class, 'id_matricula');
    }

    public function seccion() {
        return $this->belongsTo(Seccion::class,
        'id_seccion');
    }

}
