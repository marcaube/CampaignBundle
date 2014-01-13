<?php

namespace Ob\CampaignBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Campaign\Model\Contact as BaseContact;
use Campaign\Model\Email;

/**
 * @ORM\Entity
 * @ORM\Table(name="ob_campaigns__contacts")
 */
class Contact extends BaseContact
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="object")
     */
    protected $email;

    /**
     * @ORM\Column(type="array")
     */
    protected $columns;

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
     * @param Email $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param array $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }
}
