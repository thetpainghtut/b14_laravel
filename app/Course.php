<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $fillable = ['name',
                          'logo',
                          'outline',
                          'fees',
                          'during',
                          'duration'];

  public function batches($value='')
  {
    return $this->hasMany('App\Batch');
  }
}
