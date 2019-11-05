<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * $this->authorize('index', Level::class);
     */
    public function index(Request $request)
    {
        if(Auth::user()->can('viewAny', Level::class)){
            $levels = Level::orderBy('positions','asc')->get();

            if ($request->ajax()) {
                return response()->json($levels, 200);
            }
        
            return view('level.index', compact('levels'));
        }
        \abort(401);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Level::class);
        return view('level.create');
    }

    public function search(Request $request)
    {
        $level = Level::firstOrCreate(['positions' => $request->search], $request->all());
        return view('level.search', compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = new Level;
        $level->positions = $request->positions;
        $level->save();

        if($request->ajax()){
            return response()->json([
                'message' => 'Guardado exitoso',
                'level' => $level
            ], 200);
        }

        return redirect()->route('level.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        $this->authorize('view', $level);
        return view('level.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $level->update($request->all());
        return redirect()->route('level.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('level.index');
    }

    public function drop(Level $level, Attribute $attribute)
    {
        $attribute->levels()->detach($level);

        return redirect()->route('attribute.index');
    }
}
