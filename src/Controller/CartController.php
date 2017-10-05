<?php

namespace App\Controller;

use App\Cart\Cart as Cart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CartController extends Controller
{
  /**
  * @Route(path="/cart", name="cart")
  */
  public function cartAction()
  {
    $this->get('session')->set('test', 1234);
    $cart = new Cart;

    $cart->addItem('hey');

    echo $cart->getItems();


    $products = 'hey';
    return $this->render('homepage.html.twig', array(
        'products' => $products,
    ));
  }
}
