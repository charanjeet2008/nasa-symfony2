<?php
/**
 * Tests Persist Neo Command
 *
 * User: charan
 * Date: 26/4/17
 * Time: 2:54 PM
 */

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Neo\NasaBundle\Command\PersistNeoCommand;


class PersistNeoCommandTest extends WebTestCase
{
    private $_em;
    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->_em = static::$kernel->getContainer()
                                    ->get('doctrine_mongodb')
                                    ->getManager();

        $classes = array(
            'Neo\NasaBundle\DataFixtures\MongoDB\FixtureLoader'
        );
        $this->loadFixtures($classes, null, 'doctrine_mongodb');
    }

    public function testPersist()
    {
        //init persist command
        $application = new Application(static::$kernel);
        $application->add(new PersistNeoCommand());

        //get number of Neos in database before running persist Command
        $neos = $this->_em->getRepository('NasaBundle:Neo')->findAll();
        $neosCountBefore = count($neos);


        //execute persist command
        $command = $application->find('nasa:persist-neo');
        $tester = new CommandTester($command);
        $tester->execute(array(
            'command' => $command->getName()
        ));
        $str = $tester->getDisplay();

        //get number of Neos saved by persist command
        $countSaved = filter_var($str, FILTER_SANITIZE_NUMBER_INT);


        //get number of Neos in database after running persist Command
        $neos = $this->_em->getRepository('NasaBundle:Neo')->findAll();
        $neosCountAfter = count($neos);

        //verify records saved with promised
        $this->assertEquals($countSaved, ($neosCountAfter-$neosCountBefore));
    }
    protected function tearDown() {
        parent::tearDown();
    }

}