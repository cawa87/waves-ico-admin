<?php

namespace AppBundle\Command;

use AppBundle\Entity\Currency;
use AppBundle\Entity\CurrencyRate;
use AppBundle\Entity\Transaction;
use AppBundle\Entity\User;
use AppBundle\Entity\WavesTransaction;
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

        $wrapper = $this->getContainer()->get('app.wrappers.waves_node_wrapper');

        $em = $this->getContainer()->get('doctrine');
        $users = $em->getRepository(User::class)->findAll();

        foreach ($users as $user) {

            if(!$user->getWallet()){
                $output->writeln('No wallet for user: ' . $user->getEmail());
                continue;
            }

            $address = $user->getWallet()->getAddress();
            $output->writeln('User address: ' . $address);

            $transactions = $wrapper->getAddressTransactions($address);
            foreach ($transactions as $transaction) {

                $trs = $em->getRepository(WavesTransaction::class)->findOneBy([
                    'wavesId' => $transaction->id
                ]);
                if (!$trs) {
                    $wavesTransaction = new WavesTransaction();
                    $wavesTransaction->setType($transaction->type);
                    $wavesTransaction->setUser($user);
                    $wavesTransaction->setWavesId($transaction->id);
                    $wavesTransaction->setSender($transaction->sender);
                    $wavesTransaction->setSenderPublicKey($transaction->senderPublicKey);
                    $wavesTransaction->setFee($transaction->fee);
                    $wavesTransaction->setTimestamp($transaction->timestamp);
                    $wavesTransaction->setSignature($transaction->signature);
                    $wavesTransaction->setRecipient($transaction->recipient);
                    $wavesTransaction->setAssetId($transaction->assetId);
                    $wavesTransaction->setAmount($transaction->amount);
                    $wavesTransaction->setFeeAsset($transaction->feeAsset);
                    $wavesTransaction->setAttachment($transaction->attachment);
                    // $output->writeln('Transaction: ' . $address);
                    // var_dump(date('m/d/Y H:i:s', substr($transaction->timestamp,0,10)));
                    $em->getManager()->persist($wavesTransaction);

                    if ($transaction->recipient == $user->getWallet()->getAddress()) {

                        if (!$transaction->assetId) {
                            $assetId = $em->getRepository(Currency::class)->findOneBy([
                                'code' => 'WAVES'
                            ])->getAssetId();
                        } else {
                            $assetId = $transaction->assetId;
                        }

                        $currency = $em->getRepository(Currency::class)->findOneBy([
                            'assetId' => $assetId
                        ]);
                        $currencyRate = $em->getRepository(CurrencyRate::class)
                            ->getLastRateByAssetId($assetId);

                        // payment receive tx
                        $output->writeln('Creating payment receive TX');
                        $bnrTransaction = new Transaction();
                        $bnrTransaction->setTransactionType($bnrTransaction::TYPE_PAYMENT_RECEIVED);
                        $bnrTransaction->setWavesTxId($transaction->id);
                        $bnrTransaction->setUser($user);
                        $bnrTransaction->setCurrency($currency);
                        $bnrTransaction->setAmount(($transaction->amount)/100000000);
                        $bnrTransaction->setInfo('Payment received.');

                        $em->getManager()->persist($bnrTransaction);


                        // reserve token
                        $output->writeln('Creating token reserve TX');
                        $bnrTransaction = new Transaction();
                        $bnrTransaction->setTransactionType($bnrTransaction::TYPE_TOKEN_RESERVED);
                        $bnrTransaction->setUser($user);
                        // @todo current BNR price to param
                        $bnrTransaction->setAmount((($transaction->amount/100000000)*$currencyRate)/10); // CURRENT PRICE
                        $bnrTransaction->setInfo('Token reserved.');

                        var_dump($transaction->amount/100000000);
                        var_dump(($transaction->amount/100000000)*$currencyRate);
                        var_dump((($transaction->amount/100000000)*$currencyRate)/10);
                        die();

                        $em->getManager()->persist($bnrTransaction);

                    }

                }
            }
        }
        $em->getManager()->flush();

        $output->writeln('Command result.');
    }

}
