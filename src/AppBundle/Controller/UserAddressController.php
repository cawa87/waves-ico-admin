<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CurrencyRate;
use AppBundle\Entity\Transaction;
use AppBundle\Entity\User;
use AppBundle\Form\AttachAddressType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class UserAddressController extends Controller
{
    /**
     * @Route("address/")
     */
    public function indexAction()
    {


        $userCount = $this->getDoctrine()
            ->getRepository(User::class)
            ->getCount();


        $invested = $this->getDoctrine()->getRepository(Transaction::class)->getInvested();


        $rates['USD'] = 10; // @todo BNR price to params

        $btcRate = $this->getDoctrine()
            ->getRepository(CurrencyRate::class)->getLastRateByCurrency(4);


        $inv['USD'] = 0;
        foreach ($invested as $currency) {
            $rate =  $this->getDoctrine()
                ->getRepository(CurrencyRate::class)->getLastRateByCurrency($currency['currency']);
            $amount = $rate * $currency['amount'];
            $inv['USD']  += $amount;

            $investedAll[$currency['currency']] = $currency;
        }




        return $this->render('AppBundle/UserAddress/index.html.twig', [
            'userCount' => $userCount,
            'invested_usd' => $inv['USD'],
            'invested_btc' => $inv['USD'] / $btcRate,

        ]);
    }

    /**
     * @Method({"POST"})
     * @Route("address/attach" , name="attach_user_address" , options={"expose"=true})
     */
    public function attachAction(Request $request)
    {
        $form = $this->createForm(AttachAddressType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $address = $form->getData();
            $user = $this->getUser();
            $user->setWavesAddress($address['address']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }else{
            return $this->json($form->getErrors());

        }


        return $this->json([
            'success' => true
        ]);
    }
}