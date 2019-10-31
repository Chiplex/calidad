<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::withCount('levels')->get();
        return view('attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Attribute::create($request->all());
        return redirect()->route('attribute.index')->with('success', 'Elemento agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('attribute.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $attribute->name = $request->name;
        $attribute->description = $request->description;
        $attribute->save();

        return redirect()->route('attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::find($id);
        $attribute->delete();

        return back()->with('success', 'Elemento eliminado correctamente');
    }

    public function search(Request $request)
    {
        $attribute = Attribute::where('name', 'like', '%'.$request->search.'%')->get();
        return view('attribute.search', compact('attribute'));
    }

    public function writeDown(Attribute $attribute)
    {
        $levels = Level::all();
        return view('attribute.writeDown', compact('attribute', 'levels'));
    }

    public function insert(Request $request, Attribute $attribute)
    {
        $level = Level::firstOrCreate(['positions' => $request->input('positions')]);
        $attribute->levels()->syncWithoutDetaching($level);

        return redirect()->route('attribute.index')->with('success', 'Se registro correctamente');
    }
    
    public function include(Request $request, Attribute $attribute)
    {
        $attribute->levels()->syncWithoutDetaching($request->input('level'));
        
        return redirect()->route('attribute.index')->with('success', 'Se registro correctamente');
    }
}
