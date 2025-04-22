<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use DB;

class DashboardController extends Controller
{
    public function viewDashboard(){
        return view('users.userdashboard');
    }
    

}
