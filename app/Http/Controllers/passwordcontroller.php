<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use Illuminate\Http\Request;

class passwordcontroller extends Controller
{
   function  adminupdatepassword(Request $req){
// 
    $req->validate([
        'oldpassword' => 'required',
        'newpassword' => 'required',
        'confirmpassword' => 'same:newpassword',
    ]);
   
    $id =Auth::id();
    $user= user::find($id);

   if(password_verify($req->oldpassword,$user->password)){
        $user->password = bcrypt($req->newpassword);
 $user->save();
        return back()->with('message','Update');;
    }
    else{
        return back()->with(['error'=> 'Old Password  does not match try again']);
      }
}


function  teamupdatepassword(Request $req){

    $req->validate([
        'oldpassword' => 'required',
        'newpassword' => 'required',
        'confirmpassword' => 'same:newpassword',
    ]);
   
    $id =Auth::id();
    $user= user::find($id);

   if(password_verify($req->oldpassword,$user->password)){
        $user->password = bcrypt($req->newpassword);
 $user->save();
        return back()->with('message','Update');
    }
    else{
        return back()->with(['error'=> 'Old Password  does not match try again']);
      }
}
}
