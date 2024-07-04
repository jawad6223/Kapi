<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\post_category;
use Carbon\Carbon;



class mapcontroller extends Controller
{
    //
    function mapfunction(){
        $post2 = post_category::all();
        $post=post::with(['category','images','videos','attachments'])->whereMonth('date','>=',Carbon::now()->month)->where('status',1)->orderBy('id','DESC')->get();
        return view('map',compact('post','post2'));
    }
    function mapfunction2(){
        $post2 = post_category::all();
        $post=post::with(['category','images','videos','attachments'])->where('status',1)->orderBy('id','DESC')->get();
        return view('map',compact('post','post2'));
    }

    function mapfunction1(Request $req){
        $post2 = post_category::all();
        if($req->postcategoryid == 990){
            $query = post::query();
            $query->with(['category','images','videos','attachments'])->where('status',1)->orderBy('id','DESC');
            
           
            if($req->title){
                $query->where('title','LIKE', "%{$req->title}%");
                
            }
          
            if($req->fromdate){
                $query->where('date','>=', date('Y-m-d', strtotime($req->fromdate)));          
                 
            }
            
            if($req->todate){
            $query->where('date','<=' , date('Y-m-d', strtotime($req->todate)));
         
            }
            $post = $query->get(); 
          
        }
        else{
            $query = post::query();
            $query->with(['category','images','videos','attachments'])->where('status',1)->where('post_category_id',$req->postcategoryid);
         

            if($req->title){
                $query->where('title', 'LIKE', "%{$req->title}%");
                
            }   
          
            if($req->fromdate){
                $query->where('date','>=', date('Y-m-d', strtotime($req->fromdate)));          
                 
            }
            
            if($req->todate){
            $query->where('date','<=' , date('Y-m-d', strtotime($req->todate)));
      
            }
           $post = $query->get(); 
         
        }
        return view('map',compact('post','post2'));
    }

    function  mapcopy($id){
        $post2 = post_category::all();

        $post=post::with(['category','images','videos','attachments'])->where('id',$id)->orderBy('id','DESC')->get();
        return view('map',compact('post','post2'));

    }
}
