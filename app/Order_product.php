<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
  public static function productsSize() {
    $cantidad = 0;
    $shopping_cart = \Session::get('cart.orderProduct');
    foreach ($shopping_cart as $product) {
      $cantidad = $cantidad + $product->qty;
    }
    return $cantidad;
  }
  public static function total() {
    $total = 0;
    $shopping_cart = \Session::get('cart.orderProduct');
    foreach ($shopping_cart as $product) {
      $total = $total + ($product->price * $product->qty);
    }
    return $total;
  }
}
