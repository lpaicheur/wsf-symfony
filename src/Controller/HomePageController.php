<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomePageController extends Controller
{
    /**
    * @Route(path="/", name="home")
    */
    public function indexAction()
    {
      $products = $this->get('doctrine')
      ->getRepository(Product::class)
      ->findBy(array(), array('id' => 'DESC'),5);
    return $this->render('homepage.html.twig', array(
        'products' => $products,
    ));
    }
}
