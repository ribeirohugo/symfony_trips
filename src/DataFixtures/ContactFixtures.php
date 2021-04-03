<?php namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture implements DependentFixtureInterface
{
    public const CONTACT_REFERENCE = "contact 1";

    private const CONTACT_NAME = "Test Name";
    private const CONTACT_DESCRIPTION = "Test Description";
    private const CONTACT_EMAIL = "client1@domain.com";
    private const CONTACT_PHONE = "910123123";

    public function load(ObjectManager $manager)
    {
        $contact = new Contact();
        $contact->setName(self::CONTACT_NAME);
        $contact->setDescription(self::CONTACT_DESCRIPTION);
        $contact->setEmail(self::CONTACT_EMAIL);
        $contact->setPhone(self::CONTACT_PHONE);
        $contact->setActivity($this->getReference(ActivityFixtures::ACTIVITY_REFERENCE));

        $manager->persist($contact);
        $manager->flush();

        $this->addReference(self::CONTACT_REFERENCE, $contact);
    }

    public function getDependencies()
    {
        return [
            ActivityTypeFixtures::class,
        ];
    }

}
