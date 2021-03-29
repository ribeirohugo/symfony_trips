<?php namespace App\Tests\Entity;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase {

    private const CONTACT_NAME = "Contact Name Example";
    private const CONTACT_DESCRIPTION = "Contact Description Example";
    private const CONTACT_EMAIL = "test@example.com";
    private const CONTACT_PHONE = "+351 123 123 123";
    private const CONTACT_PHONE2 = "+351 123 000 000";

    public function testContact() {
        $contact = new Contact();

        $contact->setName(self::CONTACT_NAME);
        $this->assertEquals(self::CONTACT_NAME, $contact->getName());

        $contact->setDescription(self::CONTACT_DESCRIPTION);
        $this->assertEquals(self::CONTACT_DESCRIPTION, $contact->getDescription());

        $contact->setEmail(self::CONTACT_EMAIL);
        $this->assertEquals(self::CONTACT_EMAIL, $contact->getEmail());

        $timestamp = new \DateTime();
        $contact->setTimestamp($timestamp);
        $this->assertEquals($timestamp, $contact->getTimestamp());

        $contact->setPhone(self::CONTACT_PHONE);
        $this->assertEquals(self::CONTACT_PHONE, $contact->getPhone());

        $contact->setPhone2(self::CONTACT_PHONE2);
        $this->assertEquals(self::CONTACT_PHONE2, $contact->getPhone2());
    }
}
