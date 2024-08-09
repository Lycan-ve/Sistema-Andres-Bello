<?php

namespace App\Models;

use App\Models\Matricula;
use App\Models\Seccion;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table='persona';
    protected $primaryKey="id";
    protected $fillable = ['nombre', 'cedula', 'id_matricula', 'id_seccion'];
    public $timestamps = true;

    //Relacion uno a muchos (Inversa)

    public function matricula(){
        return $this->belongsTo(matricula::class, 'id_matricula');
    }

    public function seccion() {
        return $this->belongsTo(Seccion::class, 'id_seccion');
    }

}
