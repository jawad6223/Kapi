<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\post;
use App\Models\post_image;
use App\Models\post_video;
use App\Models\post_attachment;


class FileUploadController extends Controller
{
    /** 
     * Generate Upload View 
     * 
     * @return void 

    */  

    public  function admindropzoneUi($id)
    {  
        return view('admin.upload-view',compact('id'));  
    }  

    public  function dropzoneFileUpload(Request $request)  
    {  
        
$id = $request->post_id;
foreach($request->file as $key=>$file){

    $image = $request->file[$key];
    $ext = $image->extension();
    $imageName = uniqid().'.'.$ext; 

    if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
        $postimage = post_image::create([   
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);     
    }


    elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
        post_video::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
    else{
        post_attachment::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
}
        
return redirect('admin/addpost')->with('message','Delete');

    }

    public  function dropzoneFileUploadedit(Request $request)  
    {  
        
$id = $request->post_id;
foreach($request->file as $key=>$file){

    $image = $request->file[$key];
    $ext = $image->extension();
    $imageName = uniqid().'.'.$ext; 

    if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
        $postimage = post_image::create([   
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);     
    }


    elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
        post_video::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
    else{
        post_attachment::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
}
        
return redirect('admin/viewpost')->with('message99','Delete');

    }




    // --------------------------------------team-----------------------


    
    public  function teamdropzoneUi($id)
    {  
        return view('team.upload-view',compact('id'));  
    }  

    public  function dropzoneFileUpload1(Request $request)  
    {  
        
$id = $request->post_id;
foreach($request->file as $key=>$file){

    $image = $request->file[$key];
    $ext = $image->extension();
    $imageName = uniqid().'.'.$ext; 

    if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
        $postimage = post_image::create([   
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);     
    }


    elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
        post_video::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
    else{
        post_attachment::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
}
        
return redirect('team/addpost')->with('message','Delete');

    }



    public  function dropzoneFileUpload12(Request $request)  
    {  
        
$id = $request->post_id;
foreach($request->file as $key=>$file){

    $image = $request->file[$key];
    $ext = $image->extension();
    $imageName = uniqid().'.'.$ext; 

    if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
        $postimage = post_image::create([   
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);     
    }


    elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
        post_video::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
    else{
        post_attachment::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
}
        
return redirect('team/viewpost')->with('message991','Delete');

    }

    public  function dropzoneFileUploadedit12(Request $request)  
    {  
        
$id = $request->post_id;
foreach($request->file as $key=>$file){

    $image = $request->file[$key];
    $ext = $image->extension();
    $imageName = uniqid().'.'.$ext; 

    if($ext == 'png' || $ext == 'jpg' ||$ext == 'jpeg'){
        $postimage = post_image::create([   
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);     
    }


    elseif($ext == "mp4" ||$ext == 'mov' ||$ext == 'gif'){
        post_video::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
    else{
        post_attachment::create([
            'post_id'=> $id,
            'file'=> $imageName,
            'description' =>$request->description[$key]
            ]); 
            $saveimage = $image->move(public_path('images'),$imageName);  
    }
}
        
return redirect('team/dashboard')->with('message991','Delete');

    }
}