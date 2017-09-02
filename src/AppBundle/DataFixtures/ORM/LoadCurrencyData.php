<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Currency;
use AppBundle\Entity\CurrencyRate;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCurrencyData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $waves = new Currency();
        $waves->setName('Waves');
        $waves->setCode('WAVES');
        $waves->setIsCrypt(true);
        $waves->setAssetId('8t8DMJFQu5GEhvAetiA8aHa3yPjxLj54sBnZsjnJ5dsw');
        $manager->persist($waves);

        $usd = new Currency();
        $usd->setName('US Dollar');
        $usd->setCode('USD');
        $usd->setIsBase(true);
        $usd->setAssetId('Ft8X1v1LTa1ABafufpaCWyVj8KkaxUWE6xBhW6sNFJck');
        $manager->persist($usd);

        $baseRate = new CurrencyRate();
        $baseRate->setCurrency($usd);
        $baseRate->setRate(1);
        $manager->persist($baseRate);

        $eur = new Currency();
        $eur->setName('Euro');
        $eur->setCode('EUR');
        $eur->setAssetId('Gtb1WRznfchDnTh37ezoDTJ4wcoKaRsKqKjJjy7nm2zU');
        $manager->persist($eur);

        $btc = new Currency();
        $btc->setName('Bitcoin');
        $btc->setCode('BTC');
        $btc->setIsCrypt(true);
        $btc->setAssetId('8LQW8f7P5d5PZM7GtZEBgaqRPGSzS3DfPuiXrURJ4AJS');
        $manager->persist($btc);

        $eth = new Currency();
        $eth->setName('Ethereum');
        $eth->setCode('ETH');
        $eth->setIsCrypt(true);
        $eth->setAssetId('474jTeYx2r2Va35794tCScAXWJG9hU2HcgxzMowaZUnu');
        $manager->persist($eth);


        $manager->flush();
    }
}