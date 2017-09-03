<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CurrencyRate;
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

        $rates['USD'] = 10; // @todo BNR price to params

        $rates['BTC'] = $rates['USD'] / $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency(4);
        $rates['ETH'] = $rates['USD'] / $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency(5);
        $rates['EUR'] = $rates['USD'] / $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency(3);
        $rates['WAVES'] = $rates['USD'] / $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency(1);

        $userCount = $product = $this->getDoctrine()
            ->getRepository(User::class)
            ->getCount();

        return $this->render('AppBundle/Dashboard/index.html.twig', [
            'userCount' => $userCount,
            'rates' => $rates,
        ]);
    }
}
