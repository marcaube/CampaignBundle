<?php

namespace CampaignBundle\Entity;

use Campaign\Model\Campaign as BaseCampaign;

/**
 * @Entity
 * @Table(name="ob_campaigns")
 */
class Campaign extends BaseCampaign
{
    /**
     * @Id
     * @Column(type="integer")
     * @generatedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @Column(type="text", nullable=true)
     */
    private $body;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $fromEmail;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $replyToEmail;

    /**
     * @Column(type="integer")
     */
    private $status;

    /**
     * @Column(type="datetime")
     */
    private $date;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param Email $fromEmail
     */
    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = $fromEmail;
    }

    /**
     * @return Email
     */
    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    /**
     * @param Email $replyToEmail
     */
    public function setReplyToEmail($replyToEmail)
    {
        $this->replyToEmail = $replyToEmail;
    }

    /**
     * @return Email
     */
    public function getReplyToEmail()
    {
        return $this->replyToEmail;
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus($status)
    {
        parent::setStatus($status);
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
