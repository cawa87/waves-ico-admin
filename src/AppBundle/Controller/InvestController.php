<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CurrencyRate;
use AppBundle\Entity\Transaction;
use AppBundle\Form\AttachAddressType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class InvestController extends Controller
{

    /**
     * @Method({"GET"})
     * @Route("invest/{currency}/{value}" , name="invest_estimation", options={"expose"=true})
     */
    public function InvestEstimationAction(Request $request, $currency, $value)
    {
        $rate = $this->getDoctrine()->getRepository(CurrencyRate::class)->getLastRateByCurrencyCode($currency);


        return $this->json([
            'success' => true,
            'amount' => ($rate * $value) / 10,  // @todo PRICE!
            'bonus' => $this->get('app.wrappers.bonus_service')->getBonus(),
        ]);
    }

    /**
     * @Method({"GET"})
     * @Route("invest/total" , name="investment_total", options={"expose"=true})
     */
    public function getTotalInvestAction()
    {


        $btcRate = $this->getDoctrine()
            ->getRepository(CurrencyRate::class)->getLastRateByCurrency(4);

        $invested = $this->getDoctrine()->getRepository(Transaction::class)->getInvested();
        $inv['USD'] = 0;

        foreach ($invested as $currency) {
            $rate = $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency($currency['currency']);
            $amount = $rate * $currency['amount'];
            $inv['USD'] += $amount;

            $investedAll[$currency['currency']] = $currency;
        }

        return $this->json([
            'invested_usd' => $inv['USD'],
            'invested_btc' => $inv['USD'] / $btcRate
        ]);
    }
}