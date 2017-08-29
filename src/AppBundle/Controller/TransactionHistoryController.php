<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class TransactionHistoryController
 * @package AppBundle\Controller
 * @Route("transactions/")
 */
class TransactionHistoryController extends Controller
{
    /**
     * @Route("history/")
     */
    public function indexAction()
    {
        return $this->render('AppBundle/TransactionHistory/index.html.twig',[]);
    }

}
