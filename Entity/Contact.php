<?php

namespace Ob\CampaignBundle\Entity;

use Campaign\Model\Contact as BaseContact;

/**
 * @Entity
 * @Table(name="ob_contacts")
 */
class Contact extends BaseContact
{
    /**
     * @Column(type="object")
     */
    private $email;

    /**
     * @Column(type="array")
     */
    private $columns;

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
