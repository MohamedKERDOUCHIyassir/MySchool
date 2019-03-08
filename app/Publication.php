<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable=['title','description','image','user_id','classe_id'];
    //
}
