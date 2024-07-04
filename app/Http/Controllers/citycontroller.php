<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;

class citycontroller extends Controller
{
    //
    function addcityaction(request $req){

        city::create([

            'name' =>$req->name,
            'lat' =>$req->lat,
            'lng' =>$req->lng
         ]);

return back()->with('message','Add');


    }

    function viewcity(){
        $city = city::orderBy('id','DESC')->get();
        
        return view('admin.viewcity', compact('city'));
  }
  function citydelete($id){
      $city  = city::find($id);
      $city->delete();
      return back()->with('message','Add');
  }
    
}
