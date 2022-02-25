<?php

namespace App\Http\Controllers\dashboard;

class ProfileController extends BaseDashboardController
{

    public function index(){
        return view("dashboard.profile.index");
    }

}
