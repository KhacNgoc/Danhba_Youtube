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
Route::get('/', 'MyController@getindex');

Route::get('/master', function() {
    return view('layouts/master');
});

Route::get('/index', 'MyController@getindex');

Route::get('/login', function() {
    return view('pages/login');
});
Route::get('orm', 'MyController@ormtest');
Route::get('qb', 'MyController@qbtest');

Route::get('loc/{cateID}', [
    'as' => 'locdanhba',
    'uses' => 'MyController@getCate'
]);
Route::get('tim', [
    'as' => 'timkiem',
    'uses' => 'MyController@getFind'
]);
Route::post('/addcontact',[
    'as'=>'addcontact',
    'uses'=>'MyController@addContact'
]);
Route::post('/editcontact',[
    'as'=>'editcontact',
    'uses'=>'MyController@editContact'
]);
Route::get('/deletecontact/{id}',[
    'as'=>'deletecontact',
    'uses'=>'MyController@deleteContact'
]);