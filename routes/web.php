<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.admin');
});

/**
 * Rutas de Quality
 */
Route::resource('quality', 'QualityController');
Route::patch('quality/{quality}/restore', 'QualityController@restore');
Route::post('quality/{quality}/destroy', 'QualityController@forceDelete');

/**
 * Rutas de Attributes
 */
Route::resource('attribute', 'AttributeController');

/**
 * Rutas de Level
 */
Route::resource('level', 'LevelController');
Route::get('level/search', 'LevelController@search');

/**
 * Rutas de Utility
 */
Route::resource('utility', 'UtilityController');

/**
 * Rutas de Valuations
 */
Route::resource('valuations', 'ValuationsController');

/**
 * Rutas de Value
 */
Route::resource('value', 'ValueController');

/**
 * Rutas de voyagers
 */
Route::resource('voyager', 'VoyagerController');
