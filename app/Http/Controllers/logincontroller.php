<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\user;
class logincontroller extends Controller
{

 
 
  public function admin_loginpage(Request $req){
    
    $req->validate([
      'email' => 'required|email',
      'password'=> 'required|max:16|min:6'
    ]);

  if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
    $id = auth::id();
    $user = user::find($id);
    if($user->role_id == 1){
    return redirect('/admin/dashboard');
  }
  else{
    return back()->with(['error'=> 'Password and Email does not match try again']);
  }
}


  else{
    return back()->with(['error'=> 'Password and Email does not match try again']);
  }


  }
  public  function team_loginpage(request $req){
    $req->validate([
      'email' => 'required',
      'password'=> 'required|max:16|min:6'

    ]);
   

    if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
      $id = auth::id();
      $user = user::find($id);
      if($user->role_id == 2 && $user->status ==1){
      return redirect('/team/dashboard');
    }
    else{
      return back()->with(['error'=> 'Password and Email does not match try again']);
    }
    }
    else{
      return back()->with(['error'=> 'Password and Email does not match try again']);
    }
  }




     
}


