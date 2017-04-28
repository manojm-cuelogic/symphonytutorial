<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;


class ProductController extends Controller
{
    /**
     * @Route("/product/view", name="productview")
     */
    public function productviewAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productdetails = $em->getRepository('AppBundle:Product')->findAll();


        return $this->render('Product/productview.html.twig',['productdetails' => $productdetails]);

    }

    /**
     * @Route("/product/add", name="productadd")
     */
    public function productaddAction()
    {
        $product = new Product();
        $product->setProductname('Book');
        $product->setValue(35);
        $em = $this->getDoctrine()->getManager();
        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();
        //return new Response('Saved new product with id '.$product->getId());
        return new Response(
            '<html><body>Saved new product with id'.$product->getId().'</body></html>'
        );


    }

    /**
     * @Route("/product/update/{id}/{value}", name="productupdate")
     */
    public function productupdateAction($id,$value)
    {
        $em = $this->getDoctrine()->getManager();

        $item = $em->getRepository('AppBundle:Product')->find($id);

        if (!$item) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $item->setProductname($value);

        $em->flush();
        return new Response('Update product with id '.$id);


    }


    /**
     * @Route("/product/delete/{id}", name="productdelete")
     */
    public function productdeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('AppBundle:Product')->find($id);
        if (!$item) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $em->remove($item);
        $em->flush();
        return new Response('Delete product');


    }

}
