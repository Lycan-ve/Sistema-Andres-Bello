<?php

namespace App\Models;

use App\Models\Libro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ano_Academico extends Model
{
    use HasFactory;
    protected $table='ano_academico';
    protected $primaryKey="id";
    protected $fillable = ['nombre'];
    public $timestamps=false;

    //Relacion de uno a muchos

    public function libro(){
        return $this->hasMany(Libro::class, 'id');
    }

}
