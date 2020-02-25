<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
  protected $fillable = ['user_id','phone','avatar','degree_id','address'];

  public function user($value='')
  {
    return $this->belongsTo('App\User');
  }
}
