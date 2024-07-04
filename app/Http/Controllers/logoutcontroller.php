<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logoutcontroller extends Controller
{
    // 
    function  admin_logout(){
        auth::logout();
     
  return redirect('/admin/login');

    }

    function  team_logout(){
        auth::logout();
     
  return redirect('/team/login');

    }
}
