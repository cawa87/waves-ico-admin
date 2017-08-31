<?php

namespace AppBundle\Controller;

use AppBundle\Form\AttachAddressType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class InvestController extends Controller
{

    /**
     * @Method({"GET"})
     * @Route("invest/{currency}/{value}" , name="invest_estimation")
     */
    public function InvestEstimationAction(Request $request)
    {
        //@todo

        return [
            'success' => true,
            'amount' => 100,
            'bonus' => 10,
        ];
    }
}