<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = ['name','email','password','contact','street','city','state','zip','country','role_id', 'image','status'];
    use HasFactory, Notifiable;

    public function posts(){
        return $this->hasMany(post::class, 'posted_by');  

    }

 
}
