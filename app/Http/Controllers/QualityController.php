<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quality;

class QualityController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth')->except('search');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualitys = Quality::withTrashed()->get();
        return view('quality.index', compact('qualitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quality.create');
    }

    public function search(Request $request)
    {
        $quality = Quality::firstOrNew(['positions' => $request->search], $request->all());
        $quality->save();

        return view('level.search', compact('quality'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Quality::create($request->all());
        return redirect()->route('quality.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Estoy mostrando la calidad nro: ".$id;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quality $quality)
    {
        return view('quality.edit', compact('quality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quality $quality)
    {
        $quality->update($request->all());
        return redirect()->route('quality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quality $quality)
    {
        $quality->delete();
        return redirect()->route('quality.index');
    }
    
    public function restore(Request $request)
    {
        $quality = Quality::withTrashed()
            ->where(['id' => $request->quality])
            ->first();        
        $quality->restore();
        return redirect()->route('quality.index');
    }

    public function forceDelete(Request $request)
    {
        $quality = Quality::withTrashed()
            ->where(['id' => $request->quality])
            ->first();        
        $quality->forceDelete();
        return redirect()->route('quality.index');
    }
}
