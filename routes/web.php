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
    return view('welcome');
});

Route::get('peticion1/{var}', function ($var){
    return 'Hola mundo';
});

Route::get('peticion1/{var}/otra/{var2}', function ($var, $var2){
    return 'Hola mundo: '.$var. ' - '. $var2;
});

Route::get('users/{id?}', function ($id = "Juan Perez") {
    return $id;
});

Route::get('users1/{name}', function ($name) {
    return $name;
})->where('name', '[A-Za-z]+');

Route::get('calle/avenida/plaza', function () {
    return 'Este es la calle:'; 
})->name('lugar');

Route::get('zona', function () {
    return redirect()->route('lugar');
});

Route::get('calle2/avenida/plaza/{var}', function ($var) {
    return 'Este es la calle:'; 
})->name('lugar');

Route::get('zona2', function () {
    return redirect()->route('lugar', ['var' => 5]);
});

Route::middleware('auth')->group(function (){
    Route::get('middleware1', function () {
        return 1;
    });
    Route::get('middleware2', function () {
        return 2;        
    });
});

Route::get('voyager', 'VoyagerController@index');

Route::get('viajar/{lugar}', 'VoyagerController@viajar');

Route::get('desplazar/{desde}/{hasta}', 'VoyagerController@desplazar');

Route::get('transportar/{vehiculo?}', 'VoyagerController@transportar');

Route::get('valuations', 'ValuationsController');

Route::resource('calidad','QualityController');

Route::resource('valor', 'ValueController')->only([
    'index', 'show'
]);

Route::resource('attribute', 'AttributeController');

Route::resource('nivel', 'LevelController')->names([
    'create' => 'nivel.nuevo',
    'edit' => 'nivel.cambiar'
]);

Route::get('redirigir/{nivel}', function ($nivel) {
    return redirect()->route('nivel.cambiar', ['nivel' => $nivel]);
});

Route::get('viajar', 'VoyagerController@create');

Route::get('viajar/{name}/edit', 'VoyagerController@edit');

Route::get('visitar', 'VoyagerController@visitar');

Route::get('recorrer', 'VoyagerController@recorrer');