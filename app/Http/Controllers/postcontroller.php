<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\post_attachment;
use App\Models\user;
use App\Models\city;
use  App\Models\post_category;
use  App\Models\post_image;
use  App\Models\post_video;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


use Illuminate\Support\Facades\Auth;
class postcontroller extends Controller
{

  function adminviewpost(){
    $categories = Post_category::all();
    $city = city::all();
    // dd($city);
    return view('admin.addpost',compact('categories','city'));
  }

  function  adminaddpost(request $req){
$req->validate([
'title'=>'required',
'latitude'=>'required',
'longitude' => 'required'
]);
$id=Auth::id();
$post = post::create([
    'post_category_id' =>$req->postcategoryid,
    'title' =>$req->title,
    'source' => $req->source,
    'description' =>$req->description,
    'date'=>$req->date,
    'posted_by' =>$id,

     'latitude'=>$req->latitude,
    'longitude' =>$req->longitude,
    'status' =>1
  
]);
$post_id = $post->id;
return redirect('/admin/upload-ui/'.$post_id);
    }


    function viewpostadmin(){
      $id =Auth::id();
    $user1= user::find($id);
    $users =post::with(['category','post_user'])->where('status',1)->orderBy('id','DESC')->get();
     
      return view('admin.viewpost',compact('users','user1'));
  }

  function  admin_post_delete($id){

    $user = post::find($id);

    foreach($user->images as $image){
      $destinationPath = 'public/images/'.$image->file;
      if(file::exists($destinationPath)){    
       file::delete($destinationPath);
      }
    }
    foreach($user->videos as $video){
      $destinationPath = 'public/images/'.$video->file;
      if(file::exists($destinationPath)){    
       file::delete($destinationPath);
      }
    }
    foreach($user->attachments as $attachment){
      $destinationPath = 'public/images/'.$attachment->file;
      if(file::exists($destinationPath)){    
       file::delete($destinationPath);
      }
    }
  
   $user->images()->delete();
   $user->videos()->delete();
   $user->attachments()->delete();
   $user->delete();
    return back()->with('message','Delete');
  
}

function  admin_post_edit($id){
  $categories1 =post::find($id);
   $categories2 = post_category::find($categories1->post_category_id);
 
  $categories = Post_category::where('id' ,'!=', $categories1->post_category_id )->get();



  return view('admin.editpost',compact('categories','categories1','categories2'));
}

function  admin_post_update(Request $req){

  $req->validate([
    'title'=>'required',
    'latitude'=>'required',
    'longitude' => 'required'
    ]);

    
    post::find($req->id)->update([
      'post_category_id' =>$req->postcategoryid,
      'title' =>$req->title,
      'source' => $req->source,
      'description' =>$req->description,
       'latitude'=>$req->latitude,
      'longitude' =>$req->longitude,
  ]);

   
 return redirect('admin/admineditpost2/'.$req->id);
}
function  admin_post_edit2($id){
 
  $images = post_image::where('post_id',$id)->get();
    $videos = post_video::where('post_id',$id)->get();
    $attachments = post_attachment::where('post_id',$id)->get();
    

  
  return view('admin.editpost2',compact('images','videos','attachments','id'));

}

function admin_image_delete($id){

  $image = post_image::find($id);
  
  $post_id = $image->post_id;

  $destinationPath = 'public/images/'.$image->file;
  if(file::exists($destinationPath)){    
   file::delete($destinationPath);
  }
   $image->delete();
   return redirect('/admin/admineditpost2/'.$post_id)->with('message77','delete');
  
  

}

function admin_video_delete($id){
  $image = post_video::find($id);
  $post_id = $image->post_id;
  $destinationPath = 'public/images/'.$image->file;
  if(file::exists($destinationPath)){    
   file::delete($destinationPath);
  }
   $image->delete();
   return redirect('/admin/admineditpost2/'.$post_id)->with('message77','delete');
  
  

}
function admin_attachment_delete($id){

  $image = post_attachment::find($id);
  $post_id = $image->post_id;
  $destinationPath = 'public/images/'.$image->file;
  if(file::exists($destinationPath)){    
   file::delete($destinationPath);
  }
   $image->delete();
   return redirect('/admin/admineditpost2/'.$post_id)->with('message77','delete');
  
  

}





function adminpendingpost(){
  $id =Auth::id();
$user1= user::find($id);

$users =post::with(['category'])->where('status',0) ->get();
  return view('admin.pendingpost',compact('users','user1'));
}

function  admin_pending_delete($id){

$user = post::find($id);
$user->delete();
return back()->with('message','Delete');
}


function admin_pendingpost($id){
  $user = post::find($id);
  $user->status = 1;
$user->save();
return back()->with('message1','Delete');

}


// --------------------------------------Team-------------------------------------------------------------
function teamviewpost(){
  $categories = Post_category::all();
  $city = city::all();
  return view('team.addpost',compact('categories','city'));
 

}













function  teamaddpost(request $req){
    $req->validate([
    'title'=>'required',
    'latitude'=>'required',
    'longitude' => 'required'
    ]);
    $id=Auth::id();

    $post = post::create([
      'post_category_id' =>$req->postcategoryid,
      'title' =>$req->title,
      'source' => $req->source,
      'description' =>$req->description,
      'date'=>$req->date,
      'posted_by' =>$id,
      'latitude'=>$req->latitude,
      'longitude' =>$req->longitude,
      'status' =>0

    ]);
    $post_id = $post->id;
    return redirect('/team/upload-ui/'.$post_id);
  }

  function viewpostteam(){
   
    $id =Auth::id();
    $user1= user::find($id);

    
    $users =post::with(['category', 'images','videos','attachments'])->where('posted_by',$id)->orderBy('id','DESC')->get();
    // return $users;
   return view('team.viewpost',compact('users','user1'));
}






function  team_post_delete($id){


  $user = post::find($id);

  foreach($user->images as $image){
    $destinationPath = 'public/images/'.$image->file;
    if(file::exists($destinationPath)){    
     file::delete($destinationPath);
    }
  }
  foreach($user->videos as $video){
    $destinationPath = 'public/images/'.$video->file;
    if(file::exists($destinationPath)){    
     file::delete($destinationPath);
    }
  }
  foreach($user->attachments as $attachment){
    $destinationPath = 'public/images/'.$attachment->file;
    if(file::exists($destinationPath)){    
     file::delete($destinationPath);
    }
  }

 $user->images()->delete();
 $user->videos()->delete();
 $user->attachments()->delete();
 $user->delete();
  return back()->with('message','Delete');
}


function  team_post_edit($id){


  $categories1 =post::find($id);
   $categories2 = post_category::find($categories1->post_category_id);
 
  $categories = Post_category::where('id' ,'!=', $categories1->post_category_id )->get();



  return view('team.editpost',compact('categories','categories1','categories2'));

   
}


function  team_post_update(Request $req){

  $req->validate([
    'title'=>'required',
    'latitude'=>'required',
    'longitude' => 'required'
    ]);

     post::find($req->id)->update([
      'post_category_id' =>$req->postcategoryid,
      'title' =>$req->title,
      'source' => $req->source,
      'description' =>$req->description,
       'latitude'=>$req->latitude,
      'longitude' =>$req->longitude,
  ]);


    
   

 return redirect('team/editpost2/'.$req->id);
}

function  team_post_edit2($id){
 
  $images = post_image::where('post_id',$id)->get();
    $videos = post_video::where('post_id',$id)->get();
    $attachments = post_attachment::where('post_id',$id)->get();
    

  
  return view('team.editpost2',compact('images','videos','attachments','id'));

}




function team_image_delete($id){

  $image = post_image::find($id);
  $post_id = $image->post_id;

  $destinationPath = 'public/images/'.$image->file;
  if(file::exists($destinationPath)){    
   file::delete($destinationPath);
  }
   $image->delete();
   return redirect('/team/editpost2/'.$post_id)->with('message77','delete');
  
  

}

function team_video_delete($id){
  $image = post_video::find($id);
  $post_id = $image->post_id;
  $destinationPath = 'public/images/'.$image->file;
  if(file::exists($destinationPath)){    
   file::delete($destinationPath);
  }
   $image->delete();
   return redirect('/team/editpost2/'.$post_id)->with('message77','delete');
  
  

}
function team_attachment_delete($id){

  $image = post_attachment::find($id);
  $post_id = $image->post_id;
  $destinationPath = 'public/images/'.$image->file;
  if(file::exists($destinationPath)){    
   file::delete($destinationPath);
  }
   $image->delete();
   return redirect('/team/editpost2/'.$post_id)->with('message77','delete');
  
  

}
}
