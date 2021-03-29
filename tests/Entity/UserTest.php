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
        $user->setUsername(self::USER_NAME);
        $this->assertEquals(self::USER_NAME, $user->getUsername());
    }

    public function testUserEmail() {
        $user = new User();
        $user->setEmail(self::USER_EMAIL);
        $this->assertEquals(self::USER_EMAIL, $user->getEmail());
    }

    public function testUserPassword() {
        $user = new User();
        $user->setPassword(self::USER_PASSWORD);
        $this->assertEquals(self::USER_PASSWORD, $user->getPassword());
    }

    public function testUserTimestamp() {
        $user = new User();
        $timestamp = new \DateTime();
        $user->setTimestamp($timestamp);
        $this->assertEquals($timestamp, $user->getTimestamp());
    }

    public function testUserLanguage() {
        $user = new User();
        $user->setLanguage(self::USER_LANGUAGE);
        $this->assertEquals(self::USER_LANGUAGE, $user->getLanguage());
    }
}
