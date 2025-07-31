<?php

namespace App\DataFixtures;

use App\Entity\Invoice;
use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class InvoiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $clients = $manager->getRepository(Client::class)->findAll();

        for ($i = 0; $i < 150; $i++) {
            $invoice = new Invoice();
            $invoice->setReference($faker->bothify('INV-####'))
                ->setIssuedAt(\DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 year', 'now')))
                ->setStatus($faker->randomElement(['PAID', 'SENT', 'DRAFT']));

            if ($clients) {
                $invoice->setClient($faker->randomElement($clients));
            }

            $manager->persist($invoice);
        }

        $manager->flush();
    }
}
