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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('posts');
});

Route::get('/post/{post}', function ($slug) {

  $path = __DIR__ . "/../resources/posts/$slug.html";

 if(!file_exists($path)){
     //abort(404)
     return redirect('/');
 }

 //return(__DIR__);
 //dd($slug);
 return view('post', [
    
    //'post' => file_get_contents($path),
    'post' => file_get_contents(__DIR__ . "/../resources/posts/$slug.html"),
 ]);

 })->where('post', '[A-Za-z\_-]+');
 

   //dump and die
   // dd($slug);
   //dump and die an ddebug
   // ddd($slug);

