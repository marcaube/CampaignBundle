<?php

namespace Ob\CampaignBundle\Premailer;

use Guzzle\Http\Client;
use Guzzle\Http\Message\Response;

/**
 * Implementation using the Dialect Premailer API (http://premailer.dialect.ca/api)
 */
class Premailer implements PremailerInterface
{
    const API_URL = "http://premailer.dialect.ca/api/0.1/documents";

    /**
     * {@inheritdoc}
     */
    public function render($html)
    {
        $client = new Client(self::API_URL);

        $request = $client->post(null, null, array('html' => $html));
        $response = $request->send();

        return $this->getHtml($response);
    }

    /**
     * Process the response and return the HTML
     *
     * @param Response $response
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    private function getHtml($response)
    {
        $data = $response->json();
        $url = $data["documents"]["html"];

        $client = new Client($url);
        $response = $client->get()->send();

        return $response->getBody();
    }
}
