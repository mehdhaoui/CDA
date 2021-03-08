<?php
// Controller/TestController
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Products;


class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Products::class);
        $obj = $repo->findAll();
        $obj[0]->getSuppliers()->getCompanyName();

        return $this->render('test/index.html.twig', [
            'obj' =>  $obj
        ]);
    }

}