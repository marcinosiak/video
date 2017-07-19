<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
      'title',
      'url',
      'description',
      'user_id'
    ];

    /**
     * Relacja (na poziomie modelu) - film może mieć jednego autora
     * @return [type] [description]
     */
    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
