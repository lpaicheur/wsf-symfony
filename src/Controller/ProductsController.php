<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Comment;
use App\Form\ProductType;
use App\Form\CommentType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProductsController extends Controller
{
    /**
    * @Route(path="/product", name="products")
    */
    public function productsAction()
    {
        $products = $this->get('doctrine')
            ->getRepository(Product::class)
            ->findAll();

        return $this->render('Product/list.html.twig', array(
            'products' => $products,
        ));
    }

    /**
    * @Route(path="/product/add", name="addProduct")
    */
    public function addProductAction(Request $request)
    {

      $form = $this->createForm(ProductType::class, new Product);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $product = $form->getData();
        $file = $product->getImage();
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move(
            $this->getParameter('kernel.root_dir') . '/../public/uploads',
            $fileName
        );
        $product->setImage($fileName);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($product);
        $manager->flush();

        return $this->redirectToRoute('products');
      }

      return $this->render('Product/add.html.twig', array(
          'form' => $form->createView(),
      ));
    }

    /**
    * @Route(path="/product/{id}", name="singleProduct")
    */
    public function singleProductAction($id, Request $request)
    {
        $products = $this->get('doctrine')
            ->getRepository(Product::class)
            ->findById($id);

        if(!$products) {
          throw new NotFoundHttpException('Page not found');
        }

        $form = $this->createForm(CommentType::class, new Comment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $product = $form->getData();
          $product->setProduct($products[0]);
          $manager = $this->getDoctrine()->getManager();
          $manager->persist($product);
          $manager->flush();

          return $this->redirect($this->generateUrl('singleProduct', array('id' => $id)));
        }

        return $this->render('Product/single.html.twig', array(
            'product' => $products[0],
            'form' => $form->createView(),
        ));
    }
}
