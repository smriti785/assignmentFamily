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
    return view('welcome');
});

Route::get('/family','App\Http\Controllers\FamilyController@index')->name('family.index');
Route::get('/family/create','App\Http\Controllers\FamilyController@create')->name('family.create');
Route::post('/family/store','App\Http\Controllers\FamilyController@store')->name('family.store');
Route::get('/family/{id}', 'App\Http\Controllers\FamilyController@show')->name('family.show');
Route::get('/family/edit/{id}','App\Http\Controllers\FamilyController@edit')->name('family.edit');
Route::delete('/family/delete/{id}','App\Http\Controllers\FamilyController@destroy')->name('family.destroy');
Route::put('family/update/{id}','App\Http\Controllers\FamilyController@update')->name('family.update');

