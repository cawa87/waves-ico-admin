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

        // $rate = $product = $this->getDoctrine()
        //       ->getRepository(CurrencyRate::class)->getLastRateByAssetId('8LQW8f7P5d5PZM7GtZEBgaqRPGSzS3DfPuiXrURJ4AJS');
        //  var_dump($rate);


        //   die();

        $userCount = $product = $this->getDoctrine()
            ->getRepository(User::class)
            ->getCount();

        return $this->render('AppBundle/Dashboard/index.html.twig', [
            'userCount' => $userCount
        ]);
    }
}
