<?php

namespace AppBundle\Command;

use AppBundle\Entity\Currency;
use AppBundle\Entity\CurrencyRate;
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

        // BTC, WAVES, ETH
        $cryptWrapper = $this->getContainer()->get('app.wrappers.crypt_currency_rate_wrapper');
        $wrapper = $this->getContainer()->get('app.wrappers.currency_rate_wrapper');

        $em = $this->getContainer()->get('doctrine');

        $currencies = $em->getRepository(Currency::class)->findBy([
            'isCrypt' => true
        ]);

        foreach ($currencies as $currency) {
            $rates = $cryptWrapper->getCryptRate($currency->getName());

            $rate = new CurrencyRate();
            $rate->setRate($rates->price_usd);
            $rate->setCurrency($currency);

            $em->getManager()->persist($rate);
        }

        $em->getManager()->flush();

        //EUR, etc

        $currencies = $em->getRepository(Currency::class)->findBy([
            'isCrypt' => false,
            'isBase' => false,
        ]);

        foreach ($currencies as $currency) {
            $rates = $wrapper->getRate($currency->getCode());

            $rate = new CurrencyRate();
            $rate->setRate($rates->rates->USD);
            $rate->setCurrency($currency);

            $em->getManager()->persist($rate);
        }


        $em->getManager()->flush();

        $output->writeln('Command result.');
    }


}
