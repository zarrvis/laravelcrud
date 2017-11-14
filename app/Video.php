<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;

class Video extends Model
{
  // use SearchableTrait;
  //
  // protected $searchable = [
  //   'columns' => [
  //     'videos.video_title' => 10,
  //     'videos.video_url' => 10,
  //     'videos.description' => 10,
  //   ]
  // ];
    protected $fillable = ['video_title', 'video_url', 'description'];
    public function scopeSearch($query, $s){
      return $query->where('video_title', 'like', '%' .$s. '%')
                    ->orWhere('description', 'like', '%' .$s. '%');
    }
}
