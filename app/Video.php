<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
      'title',
      'url',
      'description'
    ];

    /**
     * Relacja (na poziomie modelu) - film może mieć jednego autora
     * @return [type] [description]
     */
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    /**
     * Film jest przypisany do wielu kategorii
     */
     public function categories()
     {
       return $this->belongsToMany('App\Category')->withTimestamps();
     }

     /**
      * Lista wszystkich kategorii do ktorych dodany był film
      */
      public function getCategoryListAttribute()
      {
        return $this->categories->lists('id')->all();
      }
}
