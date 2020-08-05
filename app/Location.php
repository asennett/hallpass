<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  public function current_hallpasses()
  {
    return $this->hasMany('App\Hallpass')->where('hallpasses.status','=','approved')->where('created_at','>=',Carbon::now()->subMinutes(15));
  }

}
