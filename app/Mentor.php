<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
  protected $fillable = ['name','email','phone','avatar','degree_id','address'];
}
