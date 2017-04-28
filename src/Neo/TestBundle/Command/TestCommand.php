<?php
/**
 * It can be run as `php app/console test:command`,
 * It verifies the existence of a record in Neo collection in mongodb
 *
 * User: charan
 * Date: 25/4/17
 * Time: 7:00 PM
 */

namespace Neo\TestBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

/**
 * Class TestCommand
 * @package Neo\TestBundle\Command
 */
class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('test:command')
            ->setDescription('Only a test command')
            ->addArgument('id', InputArgument::REQUIRED)
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $formatter = $this->getHelper('formatter');
        $id = $input->getArgument('id');

        $helper = $this->getHelper('question');
        $confirm = new ConfirmationQuestion('This is a test. Do you want to continue (y/N) ?', false);

        if (!$helper->ask($input, $output, $confirm)) {
            $errorMessages = array('Nothing done. Exiting...');
            $formattedBlock = $formatter->formatBlock($errorMessages, 'error');
            $output->writeln($formattedBlock);
            return;
        }

        $neo = $this->getContainer()->get('doctrine_mongodb')
            ->getRepository('NasaBundle:Neo')->findOneById($id);

        if ($neo) {
            $errorMessages = array('Document exists');
            $formattedBlock = $formatter->formatBlock($errorMessages, 'info');
            $output->writeln($formattedBlock);
        } else {
            $errorMessages = array("Document doesn't exist");
            $formattedBlock = $formatter->formatBlock($errorMessages, 'error');
            $output->writeln($formattedBlock);
        }
    }
}
