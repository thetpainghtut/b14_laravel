<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
  protected $fillable = ['name','email','phone','avatar','degree_id','address'];
}
