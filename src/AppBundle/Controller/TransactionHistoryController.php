<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Transaction;
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

        $transactions = $this->getDoctrine()->getRepository(Transaction::class)->findByUser($this->getUser());

        return $this->render('AppBundle/TransactionHistory/index.html.twig',[
            'transactions' => $transactions
        ]);
    }

}
