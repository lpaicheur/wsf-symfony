<?php

namespace App\Controller;

use App\Entity\Category;
// use App\Form\ProductType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class CategoriesController extends Controller
{
    /**
    * @Route(path="/category", name="categories")
    */
    public function productsAction()
    {
        $categories = $this->get('doctrine')
            ->getRepository(Category::class)
            ->findAll();

        return $this->render('Category/list.html.twig', array(
            'categories' => $categories,
        ));
    }

    /**
    * @Route(path="/category/{id}", name="singleCategory")
    */
    public function singleProductAction($id)
    {
        $categories = $this->get('doctrine')
            ->getRepository(Category::class)
            ->findById($id);

        if(!$categories) {
          throw new NotFoundHttpException('Page not found');
        }

        return $this->render('Category/single.html.twig', array(
            'category' => $categories[0],
        ));
    }
}
