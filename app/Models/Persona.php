<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table='persona';
    protected $primaryKey="id";
    protected $fillable = ['nombre', 'cedula', 'id_matricula', 'id_ano_academico', 'id_seccion'];
    public $timestamps = true;
}
