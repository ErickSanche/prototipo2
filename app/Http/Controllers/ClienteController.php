<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paquetes = Paquete::all();
        if(request()->expectsJson()){

            return response()->json($paquetes);
        }else
            return view('clientes.index', compact('paquetes'));
    }
}
