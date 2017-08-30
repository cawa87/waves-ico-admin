<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class UserAddressController extends Controller
{
    /**
     * @Route("address/")
     */
    public function indexAction()
    {
        return $this->render('AppBundle/UserAddress/index.html.twig',[]);
    }

}