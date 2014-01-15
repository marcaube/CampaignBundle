<?php

namespace Ob\CampaignBundle\Utils;

use Knp\Snappy\Image;

class Snapshot
{
    /**
     * @var string
     */
    private $folder;

    /**
     * @var string
     */
    private $binaryPath;

    /**
     * @param null   $folder     The folder where to save the image
     * @param string $binaryPath The path to the wkhtmltoimage binary
     */
    public function __construct($folder = null, $binaryPath = '/usr/local/bin/wkhtmltoimage')
    {
        $this->folder = $folder;
        $this->binaryPath = $binaryPath;
    }

    /**
     * @param string $html
     * @param null   $fileName
     *
     * @return string
     */
    public function render($html, $fileName = null)
    {
        if (null == $fileName) {
            $fileName = uniqid() . '.jpg';
        }

        $filePath = $this->folder . $fileName;

        $snappy = new Image($this->binaryPath);
        $snappy->setOption('disable-javascript', true);
        $snappy->setTimeout(0);
        $snappy->generateFromHtml($html, $filePath);

        return $fileName;
    }
}
