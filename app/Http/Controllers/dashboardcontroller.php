<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    //
   

    
        function admin_pending_team(){
         $totalteam = user::count();
            $approvalteam =user::where('status',1)->count();
            $pendingteam =user::where('status',0)->count();

            $totalpost = post::count();
            
            $approvalpost =post::where('status',1)->count();
            $pendingpost =post::where('status',0)->count();
     

$user = user::where('status',0) -> get();
            return view('admin.dashboard',compact('user','totalteam','approvalteam','pendingteam','totalpost','approvalpost','pendingpost'));
        }
      
       function  admin_pendingapprovals($id){
           $user=user::find($id);
           $user->status = 1;
           $user->save();
            return back()->with('message','Successfully Approved team');
        }




        

        function teamdashboard(){
            $id = auth::id();
            $user1= user::find($id);
          
            $users =post::where('posted_by',$id)->where('status',0)->get();
            
            $totalpost = post::where('posted_by',$id)->count();
            $approvalpost =post::where('status',1)->where('posted_by',$id)->count();
            $pendingpost =post::where('status',0)->where('posted_by',$id)->count();
  
            return view('team.dashboard',compact('users','user1','totalpost','approvalpost','pendingpost'));
        }


        
        function  team_post_delete($id){
          $user = post::find($id);
         $user->delete();
          return back()->with('message','Delete');
        }

        
   
    
}
