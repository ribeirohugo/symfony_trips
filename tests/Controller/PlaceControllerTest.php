<?php namespace App\Tests\Controller;

use App\DataFixtures\ActivityFixtures;
use App\Repository\PlaceRepository;
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
    private const URI_MUSEUMS = "/admin/places/museums";
    private const URI_RESTAURANTS = "/admin/places/restaurants";


    private const URI_PLACE_NEW = "/admin/places/new";
    private const URI_PLACE_EDIT = "/admin/places/edit/";
    private const URI_PLACE_DELETE = "/admin/places/delete/";
    private const URI_PLACE_ID = "/admin/place/";

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

    public function testNewPlace()
    {
        $client = static::createClient();

        $client->request('GET', self::URI_PLACE_NEW);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_PLACE_NEW);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testEditPlace()
    {
        $client = static::createClient();

        $contactRepository = static::$container->get(PlaceRepository::class);
        $testContact = $contactRepository->findOneBy([]);
        $id = $testContact->getId();

        $client->request('GET', self::URI_PLACE_EDIT.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_PLACE_EDIT.$id);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', self::URI_PLACE_EDIT.'0');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_PLACES));
    }

    public function testDeletePlace()
    {
        $client = static::createClient();

        $contactRepository = static::$container->get(PlaceRepository::class);
        $testContact = $contactRepository->findOneBy([]);
        $id = $testContact->getId();

        $client->request('GET', self::URI_PLACE_DELETE.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_PLACE_DELETE.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_PLACES));

        $client->request('GET', self::URI_PLACE_DELETE.'0');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_PLACES));
    }

    public function testPlaceId()
    {
        $client = static::createClient();

        $contactRepository = static::$container->get(PlaceRepository::class);
        $testContact = $contactRepository->findOneBy([]);
        $id = $testContact->getId();

        $client->request('GET', self::URI_PLACE_ID.$id);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect('/'));

        //Testing user from fixtures
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail(self::USER_EMAIL);

        $client->loginUser($testUser);

        // User logged in
        $client->request('GET', self::URI_PLACE_ID.$id);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', self::URI_PLACE_ID.'0');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertTrue($client->getResponse()->isRedirect(self::URI_PLACES));
    }
}
