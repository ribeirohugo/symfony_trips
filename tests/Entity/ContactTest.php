<?php namespace App\Tests\Entity;

use App\Entity\Activity;
use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase {

    private const CONTACT_NAME = "Contact Name Example";
    private const CONTACT_DESCRIPTION = "Contact Description Example";
    private const CONTACT_EMAIL = "test@example.com";
    private const CONTACT_PHONE = "+351 123 123 123";
    private const CONTACT_PHONE2 = "+351 123 000 000";
    private const CONTACT_SKYPE = "test:123";

    public function testContact() {
        $contact = new Contact();

        $contact->setId(1);
        $this->assertEquals(1, $contact->getId());

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

        $contact->setSkype(self::CONTACT_SKYPE);
        $this->assertEquals(self::CONTACT_SKYPE, $contact->getSkype());

        $activity = new Activity();
        $contact->setActivity($activity);
        $this->assertEquals($activity, $contact->getActivity());
    }
}
