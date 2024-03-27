<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $table='roles';
    protected $primaryKey='id';

    public $timestamps=false;

    //campos que se pueden modificar
    protected $fillable=[
        'name',
        'guard_name'
    ];

    public function User(){
        return $this->hasMany(User::class);
    }
}
