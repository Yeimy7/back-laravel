<?php

namespace App\Models;

use Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $fillable = ['marca','modelo','anio','placa','color'];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }
}
