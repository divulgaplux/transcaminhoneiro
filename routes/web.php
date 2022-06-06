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


Route::get('/admin/{path}', function ()
{
    return view('admin');
})->where('path', '.*');

Route::get('{path}', 'SiteController@view')->where('path', '.*');



// Route::get('/',function (){
//     return view('welcome');
// });


