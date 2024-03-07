<?php

namespace App\Models;

use App\Models\Reclamo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table='matricula';
    protected $primaryKey="id";
    protected $fillable = ['nombre'];
    public $timestamps=false;

    public function reclamo(){
        return $this->hasMany(Reclamo::class, 'id');
    }
}
