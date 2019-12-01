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
use App\Category;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function(){
    $cat=Category::all();
    foreach($cat as $c){
        echo $c->name_cat;
    }
});
