<?php

use Ob\CampaignBundle\Premailer\Premailer;

class PremailerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if (!isset($_ENV['RUN_API_TEST']) || !$_ENV['RUN_API_TEST']) {
            $this->markTestSkipped(
                'Skipping external API tests'
            );
        }

        $this->premailer = new Premailer();
    }

    public function test_render_html()
    {
        $html = '<p>foo</p>';
        $expectedHtml = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html><body><p>foo</p></body></html>
';

        $this->assertEquals(
            $expectedHtml,
            $this->premailer->render($html)
        );
    }

    public function test_inline_css()
    {
        $html = '<html><head><style>p{color:orange}</style></head><body><p>bar</p></body></html>';
        $expectedHtml = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head><style>p{color:orange}</style></head>
<body><p style="color: orange;">bar</p></body>
</html>
';

        $this->assertEquals(
            $expectedHtml,
            $this->premailer->render($html)
        );
    }
}
