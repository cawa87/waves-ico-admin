<?php

namespace AppBundle\Controller;

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
        return $this->render('AppBundle/UserAddress/index.html.twig', []);
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
        }


        return $this->json([
            'success' => true
        ]);
    }
}