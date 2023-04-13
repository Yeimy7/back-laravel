<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return  response()->json([
            "results" => $vehiculos
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            "marca" => "required|string",
            "modelo" => "required|string"
        ]);
        $cliente = Cliente::findOrFail($request->cliente_id);
        $vehiculo = $cliente->vehiculos()->create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'placa' => $request->placa,
            'color' => $request->color,
        ]);
        return  response()->json([
            "results" => $vehiculo
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);
        return  response()->json([
            "results" => $vehiculo
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $vehiculo_id)
    {
        $cliente = Cliente::findOrFail($request->cliente_id);
        $vehiculo = $cliente->vehiculos()->where('id', $vehiculo_id)->update([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'placa' => $request->placa,
            'color' => $request->color,
        ]);
        return  response()->json([
            "message" => "Vehiculo actualizado!",
            "results" => $vehiculo
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Vehiculo::findOrFail($id)->delete();
        return  response()->json([
            "message" => "Vehiculo eliminado!",
        ], Response::HTTP_OK);
    }
}
