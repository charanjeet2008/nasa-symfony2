<?php
/**
 * Flushes the test_nasa database,
 * before running the phpunit tests.
 *
 * User: charan
 * Date: 27/4/17
 * Time: 10:08 PM
 */
namespace Neo\NasaBundle\DataFixtures\MongoDB;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class DataWiper implements FixtureInterface {

    public function load(ObjectManager $manager) {

        $manager->flush();

    }

}