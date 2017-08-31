<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WavesTransaction
 *
 * @ORM\Table(name="waves_transaction")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WavesTransactionRepository")
 */
class WavesTransaction
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
     * @var int
     *
     * @ORM\Column(name="type", type="smallint")
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="waves_id", type="string", length=255)
     */
    protected $wavesId;

    /**
     * @var string
     *
     * @ORM\Column(name="sender", type="string", length=255)
     */
    protected $sender;

    /**
     * @var string
     *
     * @ORM\Column(name="sender_public_key", type="string", length=255)
     */
    protected $senderPublicKey;

    /**
     * @var int
     *
     * @ORM\Column(name="fee", type="integer")
     */
    protected $fee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime")
     */
    protected $timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=255)
     */
    protected $signature;

    /**
     * @var string
     *
     * @ORM\Column(name="recipient", type="string", length=255)
     */
    protected $recipient;

    /**
     * @var string
     *
     * @ORM\Column(name="asset_id", type="string", length=255)
     */
    protected $assetId;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     */
    protected $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="fee_asset", type="string", length=255)
     */
    protected $feeAsset;


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
     * Set type
     *
     * @param integer $type
     *
     * @return WavesTransaction
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set wavesId
     *
     * @param string $wavesId
     *
     * @return WavesTransaction
     */
    public function setWavesId($wavesId)
    {
        $this->wavesId = $wavesId;

        return $this;
    }

    /**
     * Get wavesId
     *
     * @return string
     */
    public function getWavesId()
    {
        return $this->wavesId;
    }

    /**
     * Set sender
     *
     * @param string $sender
     *
     * @return WavesTransaction
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set senderPublicKey
     *
     * @param string $senderPublicKey
     *
     * @return WavesTransaction
     */
    public function setSenderPublicKey($senderPublicKey)
    {
        $this->senderPublicKey = $senderPublicKey;

        return $this;
    }

    /**
     * Get senderPublicKey
     *
     * @return string
     */
    public function getSenderPublicKey()
    {
        return $this->senderPublicKey;
    }

    /**
     * Set fee
     *
     * @param integer $fee
     *
     * @return WavesTransaction
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Get fee
     *
     * @return int
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return WavesTransaction
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return WavesTransaction
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set recipient
     *
     * @param string $recipient
     *
     * @return WavesTransaction
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Get recipient
     *
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set assetId
     *
     * @param string $assetId
     *
     * @return WavesTransaction
     */
    public function setAssetId($assetId)
    {
        $this->assetId = $assetId;

        return $this;
    }

    /**
     * Get assetId
     *
     * @return string
     */
    public function getAssetId()
    {
        return $this->assetId;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return WavesTransaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getFeeAsset()
    {
        return $this->feeAsset;
    }

    /**
     * @param string $feeAsset
     */
    public function setFeeAsset($feeAsset)
    {
        $this->feeAsset = $feeAsset;
    }


}

