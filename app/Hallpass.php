<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hallpass extends Model
{
    public function student()
    {
      return $this->hasOne('App\User','id','student_id');
    }

    public function staff()
    {
      return $this->hasOne('App\User','id','staff_id');
    }

    public function location()
    {
      return $this->hasOne('App\Location','id','location_id');
    }
}
