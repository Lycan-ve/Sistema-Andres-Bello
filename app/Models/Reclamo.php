<?php

namespace App\Models;

use App\Models\Libro;
use App\Models\Ano_Academico;
use App\Models\Persona;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;

    protected $table='reclamo';
    protected $primaryKey="id";
    protected $fillable = ['id_libros', 'id_ano_academico', 'cantidad', 'id_persona','cantidad', 'fecha_entrega', 'fecha_tope'];
    public $timestamps = true;

    protected $dates = ['fecha_entrega', 'fecha_tope'];

    //Relacion uno a muchos (Inversa)
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function libros(){
        return $this->belongsTo(Libro::class, 'id_libros');
    }

    public function ano_academico() {
        return $this->belongsTo(Ano_Academico::class, 'id_ano_academico');
    }
}
