<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\UserWallet;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\FOSUserEvents;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RegistrationCompleteListener implements EventSubscriberInterface
{
    private $router;
    private $logger;
    private $em;

    public function __construct(UrlGeneratorInterface $router, ObjectManager $em, LoggerInterface $logger)
    {
        $this->router = $router;
        $this->em = $em;
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_CONFIRMED => [
                ['onRegistrationSuccess', -10],
            ],
        );
    }

    public function onRegistrationSuccess(FilterUserResponseEvent $event)
    {
        $this->logger->info('REGISTRATION_CONFIRMED');

        //if ($event->getUser()->getWallet() === null) {
        $user = $event->getUser();
        $wallet = new UserWallet();
        $wallet->setUser($user);
        $wallet->setAddress(uniqid());

        $this->logger->info('CREATING WALLET');
        $this->em->persist($wallet);

        $this->em->flush();

        //}
      //   $url = $this->router->generate('standard_user_registration_success');
//         $event->setResponse(new RedirectResponse('/dashboard'));
    }
}