<?php


namespace AppBundle\Service\Twig;


use Doctrine\Common\Persistence\ObjectManager;

class InvestmentsManagement
{

    protected $em;

    /**
     * UserManagement constructor.
     */
    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
    }


    public function getBtcCount()
    {
        //@todo
        return 0;
    }

    public function getDaysBeforeEnd()
    {
        //@todo
        return 30;
    }
}