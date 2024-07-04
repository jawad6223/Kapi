<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_category;
use App\Models\post;
use Illuminate\Support\Facades\File;

class categorycontroller extends Controller
{
    function admin_category(request $req){
        $req->validate([
            'name' => 'required',
            'image'=> 'required|mimes:jpeg,png,jpg,gif,svg'
            
          ]);
        $filename = $req->file('image')->store('media');
          Post_category::create([
            'name'=>$req->name,
            'icon'=> $filename
          ]);
          return redirect('/admin/addcategory')->with('message','Add');
    }


    function admin_view_category(){
      $categories = Post_category::all();
      return view('admin.viewcategory', compact('categories'));
}

function  admin_team_delete($id){
  $post_category =post_category::find($id);
  
  $destinationPath = 'storage/app/'.$post_category->icon;
 if(file::exists($destinationPath)){    
  file::delete($destinationPath);
 }
 $post_count = post::where('post_category_id',$post_category->id)->count();
 
 if($post_count == 0)
 {
  $post_category->delete();
  return back()->with('message','Category Deleted Successfully');
 }
 else
 {
  return back()->with('error_message','Can not delete Category because this category use in the Post');
 }
  
}



function editcategory($id){
  $category = post_category::find($id);
 

  return view('admin.editcategory',compact('category'));
}

function editcategoryaction(request $req){

  $req->validate([
    'name' => 'required',
  ]);
  $id = $req->id;


$update = post_category::find($id);

if ($req->has('image')) {

  $req->validate([
    'image' => 'required||mimes:jpeg,jpg,bmp,png',
]);
    $image_path = 'storage/app/' . $update->icon;
    File::delete($image_path);
    $filename = $req->file('image')->store('media');

}
else {
    $filename = $update->icon;
}



  Post_category::where('id',$id)->update([
    'name'=>$req->name,
    'icon'=> $filename
  ]);
  return redirect('/admin/viewcategory')->with('messagem','Add');
}
}























// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\post_category;
// use App\Models\post;
// use Illuminate\Support\Facades\File;

// class categorycontroller extends Controller
// {
//     function admin_category(request $req){
//         $req->validate([
//             'name' => 'required',
//             'image'=> 'required|mimes:jpeg,png,jpg,gif,svg'
            
//           ]);
//         $filename = $req->file('image')->store('media');
//           Post_category::create([
//             'name'=>$req->name,
//             'icon'=> $filename
//           ]);
//           return redirect('/admin/addcategory')->with('message','Add');
//     }


//     function admin_view_category(){
//       $categories = Post_category::all();
//       return view('admin.viewcategory', compact('categories'));
// }

// function  admin_team_delete($id){
//   $post_category =post_category::find($id);
  
//   $destinationPath = 'storage/app/'.$post_category->icon;
//  if(file::exists($destinationPath)){    
//   file::delete($destinationPath);
//  }
//  $post_count = post::where('post_category_id',$post_category->id)->count();
 
//  if($post_count == 0)
//  {
//   $post_category->delete();
//   return back()->with('message','Category Deleted Successfully');
//  }
//  else
//  {
//   return back()->with('error_message','Can not delete Category because this category use in the Post');
//  }
  
// }



// function editcategory($id){
//   $category = post_category::find($id);
 

//   return view('admin.editcategory',compact('category'));
// }

// function editcategoryaction(request $req){

//   $req->validate([
//     'name' => 'required',
//   ]);
//   $id = $req->id;


// $update = post_category::find($id);

// if ($req->has('image')) {

//   $req->validate([
//     'image' => 'required||mimes:jpeg,jpg,bmp,png',
// ]);
//     $image_path = 'storage/app/' . $update->icon;
//     File::delete($image_path);
//     $filename = $req->file('image')->store('media');

// }
// else {
//     $filename = $update->icon;
// }



//   Post_category::where('id',$id)->update([
//     'name'=>$req->name,
//     'icon'=> $filename
//   ]);
//   return redirect('/admin/viewcategory')->with('messagem','Add');
// }
// }
