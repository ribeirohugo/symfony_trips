<?php namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\Date;

class UserTest extends TestCase {

    private const USER_NAME = "Username";
    private const USER_EMAIL = "email@domain.com";
    private const USER_PASSWORD = "password test";
    private const USER_LANGUAGE = "pt";

    public function testUserName() {
        $user = new User();

        $user->setId(1);
        $this->assertEquals(1, $user->getId());

        $user->setUsername(self::USER_NAME);
        $this->assertEquals(self::USER_NAME, $user->getUsername());

        $user->setEmail(self::USER_EMAIL);
        $this->assertEquals(self::USER_EMAIL, $user->getEmail());

        $user->setPassword(self::USER_PASSWORD);
        $this->assertEquals(self::USER_PASSWORD, $user->getPassword());

        $timestamp = new \DateTime();
        $user->setTimestamp($timestamp);
        $this->assertEquals($timestamp, $user->getTimestamp());

        $user->setLanguage(self::USER_LANGUAGE);
        $this->assertEquals(self::USER_LANGUAGE, $user->getLanguage());


    }
}
