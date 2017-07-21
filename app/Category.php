<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
    * Kategoria jest przypisana do wielu filmow
    */
    public function videos()
    {
     return $this->belongsToMany('App\Video')->withTimestamps();
    }
}
