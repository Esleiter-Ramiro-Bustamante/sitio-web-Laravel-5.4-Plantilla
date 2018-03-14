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
    return view('home');
})->name('home');

Route::get('Acerca', function () {
    return view('about');
})->name('about');

Route::get('Servicio', function () {
    return view('service');
})->name('service');

Route::get('Contactos', function () {
    return view('contact');
})->name('contact');


Route::post('messages',function(){
    //enviar un correo
    $data=request()->all();
    Mail::send("emails.message",$data,function($message) use ($data){
        $message->from($data['email'],$data['name'])
        ->to('esleiter0307@gmail.com')
        ->subject($data['subject']);
    });

    // responder al usuario
return back();
})->name('messages');


