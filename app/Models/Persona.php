<?php

namespace App\Models;

use App\Models\Matricula;
use App\Models\Seccion;
use App\Models\Reclamo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table='persona';
    protected $primaryKey="id";
    protected $fillable = ['nombre', 'cedula', 'id_matricula', 'id_seccion'];
    public $timestamps = true;

    // Método para encontrar o crear una persona
    public static function findOrCreatePersona($data)
    {
        return self::firstOrCreate(
            ['cedula' => $data['cedula']], // Buscar por cédula
            [
                'nombre' => $data['nombre'],
                'id_matricula' => $data['id_matricula'],
                'id_seccion' => $data['id_seccion']
            ]
        );
    }


    public function reclamos()
    {
        return $this->hasMany(Reclamo::class, 'id_persona');
    }

    //Relacion uno a muchos (Inversa)

    public function matricula(){
        return $this->belongsTo(matricula::class, 'id_matricula');
    }

    public function seccion() {
        return $this->belongsTo(Seccion::class, 'id_seccion');
    }

}
