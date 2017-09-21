<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
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

        return $this->render('products.html.twig', array(
            'products' => $products,
        ));
    }

    /**
    * @Route(path="/product/add", name="addProduct")
    */
    public function addProductAction(Request $request)
    {
      $form = $this->createFormBuilder(new Product)
        ->add('name')
        ->add('price')
        ->add('description', CKEditorType::class)
        ->add('category')
        ->add('image', FileType::class)
        ->add('submit', SubmitType::class)
        ->getForm();

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

      return $this->render('addProduct.html.twig', array(
          'form' => $form->createView(),
      ));
    }

    /**
    * @Route(path="/product/{id}", name="singleProduct")
    */
    public function singleProductAction($id)
    {
        $products = $this->get('doctrine')
            ->getRepository(Product::class)
            ->findById($id);

        if(!$products) {
          throw new NotFoundHttpException('Page not found');
        }

        return $this->render('singleProduct.html.twig', array(
            'product' => $products[0],
        ));
    }
}
