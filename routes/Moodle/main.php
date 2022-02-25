<?php

use App\Http\Controllers\Moodle\MoodleController;
use Illuminate\Support\Facades\Route;


Route::prefix("requests")->middleware("checkToken")->name("requests.")->group(function (){
    Route::post("/payment",[MoodleController::class,"create"])->name("payment");
    Route::post("/makeCertificate",[MoodleController::class,"makeCertificate"])->name("makeCertificate");


});
Route::post("requests/makeForm",[MoodleController::class,"saveForm"])->name("saveForm");
Route::post("requests/import_package_payments",[MoodleController::class,"importPackagePayments"])->name("importPackagePayments");
