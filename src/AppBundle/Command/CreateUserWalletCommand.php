<?php

namespace AppBundle\Command;

use AppBundle\Entity\Currency;
use AppBundle\Entity\CurrencyRate;
use AppBundle\Entity\Transaction;
use AppBundle\Entity\User;
use AppBundle\Entity\UserWallet;
use AppBundle\Entity\WavesTransaction;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserWalletCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('waves:node:create-wallet')
            ->setDescription('Create user wallet')
            ->addArgument('userid', InputArgument::REQUIRED, 'User id')//    ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $wrapper = $this->getContainer()->get('app.wrappers.waves_node_wrapper');

        $em = $this->getContainer()->get('doctrine');
        $user = $em->getRepository(User::class)->find($input->getArgument('userid'));

        if (!$user->getWallet()) {

            $output->writeln('Creating wallet.');
            $address = $wrapper->generateUserWalletAddress();
            $wallet = new UserWallet();
            $wallet->setAddress($address);
            $wallet->setUser($user);

            $em->getManager()->persist($wallet);


            $em->getManager()->flush();

        }
        $output->writeln('Command result.');
    }

}
