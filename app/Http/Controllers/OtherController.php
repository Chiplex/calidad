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
    public function index()
    {
        return response()
            ->view('other.other')
            ->header('Content-Type', 'text/plain');
        return view();
    }

}
