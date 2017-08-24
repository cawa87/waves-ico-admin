<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SyncWavesTransactionCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('waves:node:sync-transactions')
            ->setDescription('Sync transactions with waves platform')
            //   ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            //    ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('argument');

        $wrapper = $this->getContainer()->get('app.wrappers.waves_node_wrapper');

        if ($input->getOption('option')) {
            // ...
        }


        $output->writeln('Command result.');
    }

}
