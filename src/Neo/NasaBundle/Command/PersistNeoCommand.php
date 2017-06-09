<?php
/**
 * It can be run as `php app/console nasa:persist-neo`,
 * It fetches the NEOs of last 3 days,
 * and saves them in mongodb
 *
 * User: charan
 * Date: 25/4/17
 * Time: 7:00 PM
 */


namespace Neo\NasaBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;



class PersistNeoCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('nasa:persist-neo')
            ->setDescription('Saves NEOs in Mongo')
            ->setHelp('This command saves NEOs of last 3 days')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return string
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filters = $this->getContainer()->get('nasa.neo.filter.collector');
        $filters->add('start_date',date('Y-m-d', strtotime('-2 days')));
        $filters->add('end_date',date('Y-m-d'));

        $downloader = $this->getContainer()->get('nasa.neo.downloader');
        $neoCollection = $downloader->call($filters);
        $neos = $neoCollection->getAll();

        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
        foreach ($neos as $neo) {
            $dm->persist($neo);
        }
        $dm->flush();

        $output->writeln(sprintf('%d NEOs Added', $neoCollection->getCount()));
    }
}