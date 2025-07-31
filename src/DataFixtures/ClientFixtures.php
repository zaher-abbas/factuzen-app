<?php

namespace App\DataFixtures;

use Faker\Factory;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $client = new Client();
            $client->setCompanyName($faker->company());
            $client->setContactName($faker->lastName());
            $client->setEmail($faker->email());
            $client->setPhone($faker->phoneNumber());
            $manager->persist($client);
        }

        $manager->flush();
    }
}
