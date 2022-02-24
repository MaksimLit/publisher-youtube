<?php
declare(strict_types = 1);

namespace App\DataFixtures;

use App\Entity\BookCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist((new BookCategory())->setTitle('Android')->setSlug('android'));
        $manager->persist((new BookCategory())->setTitle('PHP')->setSlug('php'));
        $manager->persist((new BookCategory())->setTitle('Java')->setSlug('java'));

        $manager->flush();
    }
}
