<?php

namespace App\Cart;

use Doctrine\Common\Collections\ArrayCollection;

class Cart {
  public function __construct()
  {
      $this->items = new ArrayCollection();
  }

  private $items;

  public function getItems() {
    return $this->items;
  }

  public function addItem($item) {
    $this->items = $item;
  }
}
