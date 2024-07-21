<?php

namespace App\Models;

use App\Models\Ano_Academico;
use App\Models\Asignatura;
use App\Models\Reclamo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Libro extends Model
{
    use HasFactory;

    protected $table='libros';
    protected $primaryKey="id";
    protected $fillable = ['titulo', 'id_ano_academico', 'id_asignatura', 'cantidad'];
    public $timestamps = true;

    //Relacion uno a muchos (Inversa)

    public function ano_academico(){
        return $this->belongsTo(Ano_Academico::class, 'id_ano_academico');
    }

    public function asignaturas() {
        return $this->belongsTo(Asignatura::class, 'id_asignatura');
    }

    public function reclamo(){
        return $this->hasMany(Reclamo::class, 'id');
    }
}
