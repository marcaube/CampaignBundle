<?php

namespace Ob\CampaignBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Campaign\Model\Campaign as BaseCampaign;
use Campaign\Model\Email;

/**
 * @ORM\Entity
 * @ORM\Table(name="ob_campaigns__campaigns")
 */
class Campaign extends BaseCampaign
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $body;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $fromEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $replyToEmail;

    /**
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

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
