<?php namespace App\Tests\Controller;

use App\DataFixtures\ActivityFixtures;
use App\Repository\ActivityRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlaceControllerTest extends WebTestCase
{
    private const URI_PLACES = "/admin/places";
    private const URI_BARS = "/admin/places/bars";
    private const URI_BEACHES = "/admin/places/beaches";
    private const URI_CLUBS = "/admin/places/clubs";
    private const URI_HOSTINGS = "/admin/places/hostings";
    private const URI_MONUMENTS = "/admin/places/monuments";
    private const URI_MUSEUMS = "/admin/places/monuments";
    private const URI_RESTAURANTS = "/admin/places/restaurants";


    private const URI_ACTIVITY_NEW = "/admin/activity/new";
    private const URI_ACTIVITY_EDIT = "/admin/activity/edit/";
    private const URI_ACTIVITY_DELETE = "/admin/activity/delete/";
    private const URI_ACTIVITY_ID = "/admin/activity/";

    private const USER_EMAIL = "test@domain.com";

    public function testPlaces()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_PLACES);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_PLACES);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testBars()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_BARS);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_BARS);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testBeaches()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_BEACHES);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_BEACHES);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testClubs()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_CLUBS);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_CLUBS);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testHostings()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_HOSTINGS);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_HOSTINGS);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


    public function testMonuments()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_MONUMENTS);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_MONUMENTS);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testMuseums()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_MUSEUMS);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_MUSEUMS);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testRestaurants()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_RESTAURANTS);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_RESTAURANTS);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
