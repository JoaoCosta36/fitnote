<?php

use Illuminate\Support\Facades\Route;

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
    if(Auth::check()){
        $email = Auth::user()->email;
        $nome = DB::table('perfil')->where('email', $email)->value('nome');
    return view('welcome')->with('nome', $nome);
    }else{

        return view('welcome');
    }  

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile','HomeController@mostrarPerfil')->name('profile');
Route::put('/profile','HomeController@atualizarProfile')->name('atualizarProfile');
Route::get('/medidasfit','HomeController@medidasfit')->name('fit');
Route::get('/insertData','HomeController@inserirMedidas')->name('insertData');
Route::POST('/insertData','HomeController@inserirMedidas')->name('insertData');
