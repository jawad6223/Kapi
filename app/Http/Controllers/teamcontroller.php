<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\post;
use  App\Models\post_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class teamcontroller extends Controller
{
    
    function admin_addteam(request $req)
    {
       
$req->validate([
    'email' => 'required|email|unique:users',
    'password' => 'required|max:16|min:6',
    'contact' => 'required',
    'image' => 'required||mimes:jpeg,jpg,bmp,png',
   
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
   'role_id'=>$req->role_id,
   'status'=>1
]);

return redirect('/admin/addteam')->with('message','Add');
    }



    function admin_view_team(){
        $user = user::where('status',1)->orderBy('id','DESC')->get();
        
        return view('admin.viewteam',compact('user'));
    }

//-------------------teamDetail-----------------------------
    function admin_teamdetail($id){
        $user1 = user::find($id);
       $totalpost = post::where('posted_by',$id)->where('status',1)->count();

       $users =post::with(['category'])->where('status',1)->where('posted_by',$id)->get();

        return view('admin.teamdetail',compact('user1','totalpost','users'));

    }

   




    function admin_pending_team(){

        $user = user::where('status',0) -> get();

        return view('admin.pendingteam',compact('user'));
    }

    function  admin_team_delete($id){

        $user = user::find($id);
        
        $post_count = post::where('posted_by',$user->id)->count();
        if($post_count == 0)
        {
         $user->status = 0;
         $user->save();
         return back()->with('message','Successfully Block Team'); 
        }
        else
        {
         return back()->with('error_message','Can not delete team because this Team create Post');
        }
     

    }



    
 
 

    

   function  admin_pendingapprovals($id){
       $user=user::find($id);
       $user->status = 1;
       $user->save();
        return redirect('admin/pendingteam')->with('message1','Delete');
    }
}
