<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Student extends Model
{
    
    protected $fillable = ['classe_id'];   
     /**
     * Get the student's user(table inhertance from).
     */

    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
