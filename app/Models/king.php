<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class king extends Model
{	
   protected $table = 'kings';
   public $timestamps=false; //for remove updated and created at column 
   use HasFactory;
   // protected $fillable = ['name', 'email', 'mobile','api_token',];
   //for mass assignment and what is allow to enter in database
   // protected $guarded=['api_token'];
   // for not include in mass assignment and in this we define is does not allow ; 
}
