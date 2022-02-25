<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard/profile');
    }else{
        return redirect('/login');
    }




});

Route::get("/certificate_pdf/{hash}",[\App\Http\Controllers\GlobalController\CertificateController::class,"index"]);
Route::get("/certificate_html/{hash}",[\App\Http\Controllers\GlobalController\CertificateController::class,"index_html"]);
Route::get("/certificates/",function (){
    return view("certificate/index");
});

\Illuminate\Support\Facades\Auth::routes(['register' => false,"reset"=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
require_once __DIR__."/dashboard/main.php";
require_once __DIR__."/Moodle/main.php";
