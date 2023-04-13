<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'paterno', 'materno', 'tipoDoc', 'docIdentidad', 'fecNacimiento', 'genero'];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
