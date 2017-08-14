<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @Route("/dashboard", name="dashboard")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard_homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle/Dashboard/index.html.twig',[]);
    }
}
