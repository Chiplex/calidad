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
Route::get('/', 'HomeController@index')->name('home');

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
Route::get('attribute/writedown/{attribute}', 'AttributeController@writeDown');
Route::post('attribute/insert/{attribute}', 'AttributeController@insert');
Route::post('attribute/include/{attribute}', 'AttributeController@include');
Route::post('attribute/search', 'AttributeController@search');

/**
 * Rutas de Level
 */
Route::resource('level', 'LevelController');
Route::get('level/search', 'LevelController@search');
Route::delete(
    'level/drop/{level}/{attribute}', 
    'LevelController@drop'
    )->middleware('can:drop,level');

/**
 * Rutas de Utility
 */
Route::resource('utility', 'UtilityController');

/**
 * Rutas de Valuations
 */
Route::resource('valuation', 'ValuationsController');

/**
 * Rutas de Value
 */
Route::resource('value', 'ValueController');

/**
 * Rutas de voyagers
 */
Route::resource('voyager', 'VoyagerController');

/**
 * Rutas de Autenticacion
 */
Auth::routes();


