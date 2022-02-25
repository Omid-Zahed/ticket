<?php
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\dashboard\users\UsersController;
use App\Http\Controllers\dashboard\role\UsersRoleController;
Route::prefix("dashboard")->middleware(["auth",\App\Http\Middleware\checkRole::class])->name("dashboard.")->group(function (){
    Route::get("/profile",[\App\Http\Controllers\dashboard\ProfileController::class,"index"])->name("profile");
    Route::prefix("reports")->name("reports.")->group(function (){
        Route::get("/courses",[\App\Http\Controllers\dashboard\reports\ReportsCourseController::class,"index"])->name("course");
        Route::get("/packages",[\App\Http\Controllers\dashboard\reports\ReportsPackagesController::class,"index"])->name("packages");
    });
    Route::prefix("reports")->name("reports.")->group(function (){

        Route::get("/certificate",[\App\Http\Controllers\dashboard\reports\ReportsCertificateController::class,"index"])->name("certificate");
        Route::get("/certificate/create",[\App\Http\Controllers\dashboard\reports\ReportsCertificateController::class,"create"])->name("certificate.create");
        Route::post("/certificate/create",[\App\Http\Controllers\dashboard\reports\ReportsCertificateController::class,"store"])->name("certificate.store");
        Route::get("/form/list/{type}",[\App\Http\Controllers\dashboard\reports\ReportsFormController::class,"index"])->name("from.list");
        Route::get("/form/list/show/{form}",[\App\Http\Controllers\dashboard\reports\ReportsFormController::class,"show"])->name("from.show");

    });


    Route::prefix("course")->name("course.")->group(function (){
        Route::get("/",[\App\Http\Controllers\dashboard\course\CourseController::class,"index"])->name("all");
    });

    Route::prefix("packages")->name("package.")->group(function (){
        Route::get("/",[\App\Http\Controllers\dashboard\packages\PackagesController::class,"index"])->name("all");
    });
    Route::prefix("students")->name("students.")->group(function (){
        Route::get("/",[\App\Http\Controllers\dashboard\students\StudentsController::class,"index"])->name("all");
    });

    Route::prefix("users")->name("users.")->group(function (){
        Route::get("/",[UsersController::class,"index"])->name("all");
        Route::get("/edit/{user}",[UsersController::class,"edit"])->name("edit");
        Route::post("/edit/{user}",[UsersController::class,"update"])->name("update");
        Route::get("/create",[UsersController::class,"create"])->name("create");
        Route::post("/create",[UsersController::class,"store"])->name("store");
    });

    Route::prefix("role")->name("role.")->group(function (){
        Route::get("/",[UsersRoleController::class,"index"])->name("all");
        Route::get("/edit/{role}",[UsersRoleController::class,"edit"])->name("edit");
        Route::post("/edit/{role}",[UsersRoleController::class,"update"])->name("update");
        Route::get("/create/",[UsersRoleController::class,"create"])->name("create");
        Route::post("/create/",[UsersRoleController::class,"update"])->name("store");
    });
});
