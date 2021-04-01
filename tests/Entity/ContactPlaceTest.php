<?php namespace App\Tests\Entity;


use App\Entity\Contact;
use App\Entity\ContactPlace;
use App\Entity\Place;
use PHPUnit\Framework\TestCase;

class ContactPlaceTest extends TestCase {

    public function testContactPlace() {
        $contactPlace = new ContactPlace();

        $contactPlace->setId(1);
        $this->assertEquals(1, $contactPlace->getId());

        $contact = new Contact();
        $contactPlace->setContact($contact);
        $this->assertEquals($contact, $contactPlace->getContact());

        $place = new Place();
        $contactPlace->setPlace($place);
        $this->assertEquals($place, $contactPlace->getPlace());
    }

}
