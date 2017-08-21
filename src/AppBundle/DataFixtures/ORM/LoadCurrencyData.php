<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Currency;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCurrencyData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $usd = new Currency();
        $usd->setName('US Dollar');
        $usd->setCode('USD');
        $manager->persist($usd);

        $eur = new Currency();
        $eur->setName('Euro');
        $eur->setCode('EUR');
        $manager->persist($eur);

        $btc = new Currency();
        $btc->setName('Bitcoin');
        $btc->setCode('BTC');
        $manager->persist($btc);

        $eth = new Currency();
        $eth->setName('Ethereum');
        $eth->setCode('ETH');
        $manager->persist($eth);


        $manager->flush();
    }
}