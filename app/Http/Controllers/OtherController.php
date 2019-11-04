<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                ['id' => 1, 'name' => 'objeto'],
                ['id' => 2, 'name' => 'instumento'],
                ['id' => 3, 'name' => 'artefacto']
            ]);
        }
        return view('other.other');
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $level = new Level();
            $level->positions = $request->input('positions');
            $level->save();
            return response()->json([
                "message" => "Nivel creado correctamente"
            ],200);
        }
    }

    public function vue(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                [ 'id' => 1, "name" => "Lucas"],
                [ 'id' => 2, "name" => "Tito"],
                [ 'id' => 3, "name" => "Fernando"]
            ], 200);
        }
        return view('other.vue');
    }
}
