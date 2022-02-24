<?php
declare(strict_types = 1);

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $devicesCategory = $this->getReference(BookCategoryFixtures::DEVICES_CATEGORY);
        $androidCategory = $this->getReference(BookCategoryFixtures::ANDROID_CATEGORY);

        $book = (new Book())
            ->setTitle('RxJava for Android Developers')
            ->setPublicationDate(new DateTime('2019-04-01'))
            ->setMeap(false)
            ->setAuthors(['Timo Tuominen'])
            ->setSlug('rxjava-for-android-developers')
            ->setCategories(new ArrayCollection([$androidCategory, $devicesCategory]))
            ->setImage('https://images.manning.com/360/480/resize/book/b/bc57fb7-b239-4bf5-bbf2-886be8936951/Tuominen-RxJava-HI.png');

        $manager->persist($book);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BookCategoryFixtures::class
        ];
    }
}