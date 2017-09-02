<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currency
 *
 * @ORM\Table(name="currency")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CurrencyRepository")
 */
class Currency
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="string", length=255, nullable=true)
     */
    protected $info;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=30, unique=true)
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, unique=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="is_crypt", type="boolean")
     */
    protected $isCrypt = false;

    /**
     * @var string
     *
     * @ORM\Column(name="is_base", type="boolean")
     */
    protected $isBase = false;

    /**
     * @var string
     *
     * @ORM\Column(name="asset_id", type="string", length=255, unique=true)
     */
    protected $assetId;

    /**
     * @var CurrencyRate[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CurrencyRate", mappedBy="currency")
     *
     */
    protected $rates;


    /**
     * @var Transaction[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Transaction",mappedBy="currency", fetch="EXTRA_LAZY")
     */
    protected $transactions;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set info
     *
     * @param string $info
     *
     * @return Currency
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Currency
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return CurrencyRate[]
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * @param CurrencyRate[] $rates
     */
    public function setRates($rates)
    {
        $this->rates = $rates;
    }

    /**
     * @return string
     */
    public function getAssetId()
    {
        return $this->assetId;
    }

    /**
     * @param string $assetId
     */
    public function setAssetId($assetId)
    {
        $this->assetId = $assetId;
    }

    /**
     * @return Transaction[]
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param Transaction[] $transactions
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * @return string
     */
    public function isCrypt()
    {
        return $this->isCrypt;
    }

    /**
     * @param string $isCrypt
     */
    public function setIsCrypt($isCrypt)
    {
        $this->isCrypt = $isCrypt;
    }

    /**
     * @return string
     */
    public function isBase()
    {
        return $this->isBase;
    }

    /**
     * @param string $isBase
     */
    public function setIsBase($isBase)
    {
        $this->isBase = $isBase;
    }



}

