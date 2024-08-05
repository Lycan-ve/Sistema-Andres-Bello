<?php

namespace App\Models;

use App\Models\Libro;
use App\Models\Ano_Academico;
use App\Models\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;

    protected $table='reclamo';
    protected $primaryKey="id";
    protected $fillable = ['id_libros', 'id_ano_academico', 'fecha_emision', 'fecha_entrega'];
    public $timestamps = true;


    //Relacion uno a muchos (Inversa)

    public function libros(){
        return $this->belongsTo(Libro::class, 'id_libros');
    }

    public function ano_academico(){
        return $this->belongsTo(Ano_Academico::class, 'id_ano_academico');
    }

    public function setFechaEntregaAttribute($value)
    {
        $this->attributes['fecha_entrega'] = $value ? Carbon::parse($value) : null;
    }

    public function getFechaEntregaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }
}
