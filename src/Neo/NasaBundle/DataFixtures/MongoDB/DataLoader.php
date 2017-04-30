<?php
/**
 * Created by PhpStorm.
 * User: applect
 * Date: 30/4/17
 * Time: 11:32 AM
 */
namespace Neo\NasaBundle\DataFixtures\MongoDB;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Neo\NasaBundle\Document\Neo;


class DataLoader implements FixtureInterface {

    public function load(ObjectManager $manager) {

        $neo = new Neo();
        $neo->setDate('2017-04-25');
        $neo->setNeoReferenceId('3744792');
        $neo->setName('3744792');
        $neo->setIsHazardous(true);
        $neo->setSpeed('5000');
        $manager->persist($neo)
        ;
        $neo = new Neo();
        $neo->setDate('2017-04-28');
        $neo->setNeoReferenceId('9044792');
        $neo->setName('989837');
        $neo->setIsHazardous(false);
        $neo->setSpeed('1000');
        $manager->persist($neo);

        $neo = new Neo();
        $neo->setDate('2017-04-28');
        $neo->setNeoReferenceId('7044792');
        $neo->setName('789837');
        $neo->setIsHazardous(true);
        $neo->setSpeed('4000');
        $manager->persist($neo);

        $manager->flush();

    }

}