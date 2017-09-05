<?php


namespace AppBundle\Service\Twig;


class UserManagement
{

    protected $repository;

    /**
     * UserManagement constructor.
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

}