<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\user;
class profilecontroller extends Controller
{
    


    // ---------------------------ADMIN-----------------------------------
    function admin_profile()
    {
        $id =Auth::id();
        $user= user::find($id);
        return view('admin.profile',compact('user'));

    }  

    function  admin_profile_update(request $req){

        
        $req->validate([
            'name' =>'required',
            'email' => 'required|email',
            'contact' => 'required',           
        ]);

        $id =Auth::id();
        $update  = user::findOrFail($id);
        $emailExists = user::where('id', '<>', $id)->where('email', $req->email)->first();
        if($emailExists){
            return back()->with('message1','Email Already exist');
        }

        $input = $req->all();
        $update->fill($input)->save();

          return back()->with('message','Successfully update profile');
        
         
        
    }


      // ---------------------------TEAM-----------------------------------
      function team_profile()
      {
          $id =Auth::id();
          $user= user::find($id);
          return view('team.profile',compact('user'));
  
      }  
  
      function  team_profile_update(request $req){
  
          
          $req->validate([
              'name' =>'required',
              'email' => 'required|email',
      
              'contact' => 'required', 
          ]);
  
          $id =Auth::id();
         
          $update  = user::findOrFail($id);
          $emailExists = user::where('id', '<>', $id)->where('email', $req->email)->first();
          if($emailExists){
              return back()->with('message1','Email Already exist');
          }
  
          $input = $req->all();
      
            $update->fill($input)->save();
  
            return back()->with('message','Successfully update profile');
          
           
          
      }



















}
