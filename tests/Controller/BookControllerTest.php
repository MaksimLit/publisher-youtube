<?php
declare(strict_types = 1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookControllerTest extends WebTestCase
{
    public function testBooksByCategory():void
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/category/5/books');
        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonFile(
            __DIR__ . '/responses/BookControllerTest_testBooksByCategories.json',
            $responseContent
        );
    }
}
