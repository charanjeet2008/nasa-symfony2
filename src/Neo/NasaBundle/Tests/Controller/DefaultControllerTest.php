<?php
/**
 * It tests the Default Controller's Hello World action
 *
 * User: charan
 * Date: 28/4/17
 * Time: 4:41 PM
 */

namespace Neo\NasaBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertContains('{"hello":"world!"}', $client->getResponse()->getContent());
    }
}
