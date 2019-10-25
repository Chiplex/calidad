<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoyagerController extends Controller
{
    public function index()
    {
        $num1 = 25;
        $num2 = 75;
        $num3 = 135;

        
        return view('voyager.index', compact('num1', 'num2', 'num3'));
    }

    public function viajar($lugar)
    {
        
    }

    public function desplazar($desde, $hasta)
    {
        $data = array(
            $desde,
            $hasta
        );

        $count = count($data);
        return view('voyager.displace', compact('data', 'count'));
    }

    public function transportar($vehiculo='auto')
    {
        return "Viajar mediante ". $vehiculo;
    }

    public function create()
    {
        return view('voyager.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'type' => 'required',
            'linea' => 'required'
        ]);
    }

    public function edit($name)
    {
        return view('voyager.edit', ['data' => $name]);
    }

    public function visitar()
    {
        $lugares = array(
            'Salar de uyuni',
            'Lago Titicaca',
            'Sorata',
            'Cuzco' 
        );

        return view('voyager.visitar', compact('lugares'));
    }

    public function recorrer()
    {
        $calles = array(
            'Destino',
            'Jaen',
            'Sucre',
            'Juan de la Riva'
        );

        $count = count($calles);

        return view('voyager.recorrer', compact('calles', 'count'));
    }
}
