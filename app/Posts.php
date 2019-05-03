<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  protected $fillable = [
        'post_title',
        'post_description',
        'post_image',
        'post_video',
        'post_link',
        'post_target_self'
  ];
}
