<?php

namespace AppBundle\Controller;

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
        $userCount = $product = $this->getDoctrine()
            ->getRepository(User::class)
            ->getCount();
        
        return $this->render('AppBundle/Dashboard/index.html.twig',[
            'userCount' => $userCount
        ]);
    }
}
