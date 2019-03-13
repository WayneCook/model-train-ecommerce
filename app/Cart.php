<?php

namespace App;
use Session;
class Cart
{

    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if (!empty($oldCart)){
         $this->items = $oldCart->items;
         $this->totalQty = $oldCart->totalQty;
         $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $count) {

      $id =$item->id;

      for ($i=0; $i < $count; $i++) {

        $storedItem =  ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if($this->items){
         if(array_key_exists($id, $this->items)){
          $storedItem = $this->items[$id];
         }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
      }
    }

    public function remove($item, $count) {

        $id = $item->id;

        for ($i=0; $i < $count; $i++) {

            if($this->items){
                if(array_key_exists($id, $this->items)) {
                    if ($this->items[$id]['qty'] <= 1) {
                      unset($this->items[$id]);
                      $this->totalQty--;
                      $this->totalPrice -= $item->price;
                      return;
                    } else {
                      $this->items[$id]['qty']--;
                      $this->totalQty--;
                      $this->totalPrice -= $item->price;
                    }
                }
            }
        }
    }
}
