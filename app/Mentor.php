<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
  protected $fillable = ['user_id','phone','avatar','degree_id','address'];
}
