<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\File;

class signupcontroller extends Controller
{
    
    // 
    public  function team_signuppage(request $req){

        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:16|min:6',
            'contact' => 'required',
            'image' => 'required||mimes:jpeg,jpg,bmp,png',
            'street' => 'required',
            'city' => 'required',
             'state' => 'required',
            'zip' => 'required',
            'country' => 'required'

    
    ]);
   
    $filename = $req->file('image')->store('media');
  

    User::create([
       'name'=>$req->name,
       'email'=>$req->email,
       'password'=>bcrypt($req->password),
       'contact'=>$req->contact,
       'image'=>$filename,
       'street'=>$req->street,
       'city'=>$req->city,
       'state'=>$req->state,
       'zip'=>$req->zip,
       'country'=>$req->country,
       'role_id'=> 2
    ]);
    
    
    return back()->with('message','Successfully create team wait Admin approval then login');
        }
    
    }

