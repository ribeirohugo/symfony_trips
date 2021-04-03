<?php namespace App\Tests\Controller;

use App\DataFixtures\ActivityFixtures;
use App\Repository\ActivityRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ActivityControllerTest extends WebTestCase
{
    private const URI_ACTIVITIES = "/admin/activities";
    private const URI_ACTIVITY_NEW = "/admin/activity/new";
    private const URI_ACTIVITY_EDIT = "/admin/activity/edit/";
    private const URI_ACTIVITY_DELETE = "/admin/activity/delete/";
    private const URI_ACTIVITY_ID = "/admin/activity/";

    private const USER_EMAIL = "test@domain.com";

    public function testActivityIndex()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_ACTIVITIES);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_ACTIVITIES);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testNewActivity()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_ACTIVITY_NEW);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_ACTIVITY_NEW);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testEditActivity()
    {
        $client = static::createClient();

        $contactRepository = static::$container->get(ActivityRepository::class);
        $testContact = $contactRepository->findOneBy([]);
        $id = $testContact->getId();

        $client->request('GET', self::URI_ACTIVITY_EDIT.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_ACTIVITY_EDIT.$id);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', self::URI_ACTIVITY_EDIT.'0');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_ACTIVITIES));
    }


    public function testDeleteActivity()
    {
        $client = static::createClient();

        $contactRepository = static::$container->get(ActivityRepository::class);
        $testContact = $contactRepository->findOneBy(['name' => ActivityFixtures::ACTIVITY2_NAME]);
        $id = $testContact->getId();

        $client->request('GET', self::URI_ACTIVITY_DELETE.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_ACTIVITY_DELETE.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_ACTIVITIES));

        $client->request('GET', self::URI_ACTIVITY_DELETE.'0');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_ACTIVITIES));
    }

    public function testContactId()
    {
        $client = static::createClient();

        $contactRepository = static::$container->get(ActivityRepository::class);
        $testContact = $contactRepository->findOneBy([]);
        $id = $testContact->getId();

        $client->request('GET', self::URI_ACTIVITY_ID.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_ACTIVITY_ID.$id);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', self::URI_ACTIVITY_ID.'0');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_ACTIVITIES));
    }
}
