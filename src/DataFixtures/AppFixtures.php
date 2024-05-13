<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($p=1;$p<30;$p++)
        {
            $product = new Product();
            $product->setTitle("produit ".$p)
                ->setDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quam id dolor aliquam eaque asperiores nemo numquam cum excepturi consequatur, eos voluptatem modi aperiam in aliquid consectetur quo cumque atque sint quos architecto! Voluptatem laudantium sunt itaque tenetur, aliquam voluptas laborum, quam nihil dignissimos, illum beatae officia sequi labore delectus.");
            $manager->persist($product);
        }

        $manager->flush();
    }
}
