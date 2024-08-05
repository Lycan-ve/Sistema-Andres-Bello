<?php

namespace App\Models;

use App\Models\Libro;
use App\Models\Ano_Academico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;

    protected $table='reclamo';
    protected $primaryKey="id";
    protected $fillable = ['id_libros', 'id_ano_academico' ,'cantidad', 'fecha_entrega'];
    public $timestamps = true;


    //Relacion uno a muchos (Inversa)

    public function libros(){
        return $this->belongsTo(Libro::class, 'id_libros');
    }

    public function ano_academico() {
        return $this->belongsTo(Ano_Academico::class, 'id_ano_academico');
    }
}
