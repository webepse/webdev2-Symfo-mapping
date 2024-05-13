<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProductRepository $repo): Response
    {
        $products = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'products' => $products,
        ]);
    }

    // #[Route("/product/{slug}", name: "product_show")]
    // public function show(Product $product): Response
    // {
    //     return $this->render("home/show.html.twig",[
    //         'product' => $product
    //     ]);
    // }
    #[Route("/product/{slug}", name: "product_show")]
    public function show(#[MapEntity(mapping: ['slug' => 'slug'])] Product $product): Response
    {
        return $this->render("home/show.html.twig",[
            'product' => $product
        ]);
    }
}
