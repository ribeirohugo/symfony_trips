<?php namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testHomePage()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testAdminPage()
    {
        $client = static::createClient();

        $client->request('GET', '/admin');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testAdminPageWhileLoggedIn()
    {
        $client = static::createClient();

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@domain.com');

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', '/admin');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        //$this->assertResponseIsSuccessful();
        //$this->assertSelectorTextContains('h1', 'Hello Username!');

        $client->request('GET', '/');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}

