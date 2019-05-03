<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $fillable = [
        'item_name',
        'item_icon',
        'item_url',
        'item_target_self',
        'item_rel'
  ];
}
