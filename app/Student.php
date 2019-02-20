<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    

     /**
     * Get the student's user(table inhertance from).
     */
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
