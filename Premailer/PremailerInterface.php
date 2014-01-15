<?php

namespace Ob\CampaignBundle\Premailer;

interface PremailerInterface
{
    /**
     * @param string $code
     *
     * @return string
     */
    public function render($code);
}
