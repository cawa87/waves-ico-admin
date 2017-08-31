<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CurrencyGetRatesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('currency:get-rates')
            ->setDescription('Get currency rate via api calls')
         //   ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
        //    ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       // $argument = $input->getArgument('argument');

        $wrapper = $this->getContainer()->get('app.wrappers.currency_rate_wrapper');

        if ($input->getOption('option')) {
            // ...
        }

        var_dump($wrapper->getRate('bitcoin'));
        var_dump($wrapper->getRate('bitcoin','UAH'));
        die();

        $output->writeln('Command result.');
    }

}
