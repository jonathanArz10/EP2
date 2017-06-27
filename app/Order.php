<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public static function lastID() {
   return  Order::get()->last()->id;
  }
}
