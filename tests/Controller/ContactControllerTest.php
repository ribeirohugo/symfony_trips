<?php namespace App\Tests\Controller;

use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    private const URI_CONTACTS = "/admin/contacts";
    private const URI_CONTACT_NEW = "/admin/contact/new";
    private const URI_CONTACT_EDIT = "/admin/contact/edit/";
    private const URI_CONTACT_DELETE = "/admin/contact/delete/";
    private const URI_CONTACT_ID = "/admin/contacts/";

    private const USER_EMAIL = "test@domain.com";

    public function testContactIndex()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_CONTACTS);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_CONTACTS);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testNewContact()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_CONTACT_NEW);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_CONTACT_NEW);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testEditContact()
    {
        $client = static::createClient();

        $contactRepository = static::$container->get(ContactRepository::class);
        $testContact = $contactRepository->findOneBy([]);
        $id = $testContact->getId();

        $client->request('GET', self::URI_CONTACT_EDIT.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_CONTACT_EDIT.$id);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', self::URI_CONTACT_EDIT.'0');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_CONTACTS));
    }

    public function testDeleteContact()
    {
        $client = static::createClient();

        $contactRepository = static::$container->get(ContactRepository::class);
        $testContact = $contactRepository->findOneBy([]);
        $id = $testContact->getId();

        $client->request('GET', self::URI_CONTACT_DELETE.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_CONTACT_DELETE.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_CONTACTS));

        $client->request('GET', self::URI_CONTACT_DELETE.'0');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_CONTACTS));
    }

    public function testContactId()
    {
        $client = static::createClient();

        $contactRepository = static::$container->get(ContactRepository::class);
        $testContact = $contactRepository->findOneBy([]);
        $id = $testContact->getId();

        $client->request('GET', self::URI_CONTACT_ID.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_CONTACT_ID.$id);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', self::URI_CONTACT_ID.'0');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_CONTACTS));
    }
}
