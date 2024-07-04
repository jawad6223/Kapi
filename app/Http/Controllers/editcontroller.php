<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
class editcontroller extends Controller
{

    

    function profile_edit($id)
    {
       
        $user= user::find($id);
        return view('admin.editteam',compact('user'));

    }




    function  team_edit(request $req){
        $req->validate([
            'name' =>'required',
            'email' => 'required|email',
            'contact' => 'required'
        ]);

        $id =$req->id;
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
