<?php

namespace App\Controller;

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
      return $this->render('homepage.html.twig');
    }
}
