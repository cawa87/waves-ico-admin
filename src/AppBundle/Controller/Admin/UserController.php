<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Wrappers\CurrencyRateWrapper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @Route("/admin/user")
 */
class UserController extends Controller
{
    /**
     * @Route("/", name="admin_user_list")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle/Admin/User/index.html.twig',[]);
    }
}
