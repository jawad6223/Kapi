<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_attachment extends Model
{
    protected $table='post_attachment';
    protected $fillable = ['post_id','file','description'];
  
    use HasFactory;
}


// 