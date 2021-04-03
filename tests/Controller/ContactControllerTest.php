<?php namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    private const USER_EMAIL = "test@domain.com";

    public function testContactIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/admin/contacts');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', '/admin/contacts');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testNewContact()
    {
        $client = static::createClient();

        $client->request('GET', '/admin/contact/new');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', '/admin/activity/new');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
