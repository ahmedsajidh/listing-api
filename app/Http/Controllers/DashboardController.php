<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dashboard;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\User;

class DashboardController extends Controller
{
    public function userDashboard()

    {

        $users = User::all();

        $success =  $users;


        return response()->json($success, 200);

    }


    public function adminDashboard()

    {

        $users = Admin::all();

        $success =  $users;


        return response()->json($success, 200);

    }

}
