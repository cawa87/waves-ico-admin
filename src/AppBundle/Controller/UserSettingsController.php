<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserSettingsController extends Controller
{
    /**
     * @Route("settings/")
     */
    public function indexAction()
    {
        return $this->render('AppBundle/UserSettings/index.html.twig',[]);
    }

}
