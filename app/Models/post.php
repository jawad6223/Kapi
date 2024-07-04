<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class post extends Model
{

    use HasFactory;
   
    protected $fillable = ['post_category_id','title','source','description','date','latitude','longitude','posted_by','status'];


    public function category(){
        return $this->belongsTo(post_category::class, 'post_category_id');
    }

    public function post_user(){
        return $this->belongsTo(user::class, 'posted_by');
    }

    
    public function images(){
    return $this->hasMany(post_image::class,'post_id');    

    }

    public function videos(){
        return $this->hasMany(post_video::class,'post_id');    

    }
    public function attachments(){
        return $this->hasMany(post_attachment::class,'post_id');    

    }


    

    

 }




