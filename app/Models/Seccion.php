<?php

namespace App\Models;

use App\Models\Reclamo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $table='seccion';
    protected $primaryKey="id";
    protected $fillable = ['nombre'];
    public $timestamps=false;

    //Relacion de uno a muchos

    public function reclamo(){
        return $this->hasMany(Reclamo::class, 'id');
    }
}
