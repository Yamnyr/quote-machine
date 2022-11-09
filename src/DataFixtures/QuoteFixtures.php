<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Quote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuoteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; ++$i) {
            $quote = new Quote();
            $quote->setContent('content'.$i);
            $quote->setMeta('meta'.$i);
            // $quote->setCategory('category'.$i)
            $manager->persist($quote);
        }
        $manager->flush();
    }
}
