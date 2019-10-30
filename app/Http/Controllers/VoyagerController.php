<?php

namespace App\Http\Controllers;

use App\Models\Voyager;
use Illuminate\Http\Request;

class VoyagerController extends Controller
{
    public function index()
    {
        $voyagers = Voyager::all();
        
        return view('voyager.index', compact('voyagers'));
    }

    public function create()
    {
        return view('voyager.create');
    }

    public function store(Request $request)
    {
        Voyager::create($request->all());

        return redirect()->route('voyager.index');
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
