<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Vehiculo;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return  response()->json([
            "results" => $clientes
        ], Response::HTTP_OK);
    }
    public function store(Request $request)
    {
        //validamos los datos
        $request->validate([
            "nombre" => "required",
            "paterno" => "required",
        ]);
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->paterno = $request->paterno;
        $cliente->materno = $request->materno;
        $cliente->tipoDoc = $request->tipoDoc;
        $cliente->docIdentidad = $request->docIdentidad;
        $cliente->fecNacimiento = $request->fecNacimiento;
        $cliente->genero = $request->genero;

        $cliente->save();
        return  response()->json([
            "results" => $cliente
        ], Response::HTTP_OK);
    }
    public function show($id)
    {
        $cliente = Cliente::with('vehiculos')->findOrFail($id);
        return  response()->json([
            "results" => $cliente
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre = $request->nombre;
        $cliente->paterno = $request->paterno;
        $cliente->materno = $request->materno;
        $cliente->tipoDoc = $request->tipoDoc;
        $cliente->docIdentidad = $request->docIdentidad;
        $cliente->fecNacimiento = $request->fecNacimiento;
        $cliente->genero = $request->genero;
        $cliente->save();
        return  response()->json([
            "result" => $cliente
        ], Response::HTTP_OK);
    }
    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return  response()->json([
            "result" => "cliente eliminado"
        ], Response::HTTP_OK);
    }
}
