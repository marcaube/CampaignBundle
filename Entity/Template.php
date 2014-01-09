<?php

namespace CampaignBundle\Entity;

use Campaign\Model\Template as BaseTemplate;

/**
 * @Entity
 * @Table(name="ob_templates")
 */
class Template extends BaseTemplate
{
    /**
     * @Column(type="string", length=255)
     */
    private $name;

    /**
     * @Column(type="text")
     */
    private $code;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $snapshot;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $snapshot
     */
    public function setSnapshot($snapshot)
    {
        $this->snapshot = $snapshot;
    }

    /**
     * @return string
     */
    public function getSnapshot()
    {
        return $this->snapshot;
    }
}
