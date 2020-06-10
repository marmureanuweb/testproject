<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Customer;

class CustomerFixtures extends Fixture
{
    /** @var array  */
    public static $customers = [
        [
            'email' => 'testing@home.ro',
            'enabled' => 1,
            'full_name' => 'Testing from home is cool',
        ],
        [
            'email' => 'listening@music.ro',
            'enabled' => 0,
            'full_name' => 'Listening music while coding is cool',
        ],
        [
            'email' => 'coding@marmurenau.ro',
            'enabled' => 1,
            'full_name' => 'Coding Marmurenau',
        ]
    ];


    public function load(ObjectManager $manager)
    {
        foreach (self::$customers as $customer) {
            $customerEntity = new Customer();
            $customerEntity->setEmail($customer['email']);
            $customerEntity->setEnabled($customer['enabled']);
            $customerEntity->setFullName($customer['full_name']);
            $manager->persist($customerEntity);
        }

        $manager->flush();
    }
}
