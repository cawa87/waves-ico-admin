<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CurrencyRate;
use AppBundle\Entity\Transaction;
use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DashboardController extends Controller
{


    /**
     * @Route("/", name="dashboard_homepage")
     */
    public function indexAction(Request $request)
    {

        $invesed = $this->getDoctrine()->getRepository(Transaction::class)->getInvested();

        $balance = $this->getDoctrine()->getRepository(Transaction::class)->getTotalBalance($this->getUser());

        $rates['USD'] = 10; // @todo BNR price to params

        $btcRate = $this->getDoctrine()
            ->getRepository(CurrencyRate::class)->getLastRateByCurrency(4);

        $rates['BTC'] = $rates['USD'] / $btcRate;
        $rates['ETH'] = $rates['USD'] / $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency(5);
        $rates['EUR'] = $rates['USD'] / $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency(3);
        $rates['WAVES'] = $rates['USD'] / $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency(1);

        $inv['USD'] = 0;
        foreach ($invesed as $currency) {
             $rate =  $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency($currency['currency']);
             $amount = $rate * $currency['amount'];
            $inv['USD']  += $amount;
        }

        $userCount = $product = $this->getDoctrine()
            ->getRepository(User::class)
            ->getCount();

        

        return $this->render('AppBundle/Dashboard/index.html.twig', [
            'userCount' => $userCount,
            'rates' => $rates,
            'invesed' => $invesed,
            'invested_usd' => $inv['USD'],
            'invested_btc' => $inv['USD'] / $btcRate,
            'balance' => $balance
        ]);
    }
}
