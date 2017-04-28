<?php
/**
 * It tests the Neo Controllers' actions
 *
 * User: charan
 * Date: 28/4/17
 * Time: 4:45 PM
 */

namespace Neo\NasaBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class NeoControllerTest extends WebTestCase
{
    public function testGetHazardous()
    {
        $client = static::createClient();

        $client->request('GET', '/neo/hazardous');

        $response = $client->getResponse();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('application/json', $response->headers->get('Content-Type'));

        if ($response->getContent() == '{}') return;

        $this->assertContains('"id"', $response->getContent());
        $this->assertContains('"date"', $response->getContent());
        $this->assertContains('"neo_reference_id"', $response->getContent());
        $this->assertContains('"name"', $response->getContent());
        $this->assertContains('"speed"', $response->getContent());
        $this->assertContains('"is_hazardous"', $response->getContent());

    }

    public function testGetFastest()
    {
        $client = static::createClient();

        $client->request('GET', '/neo/fastest');

        $response = $client->getResponse();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('application/json', $response->headers->get('Content-Type'));

        if ($response->getContent() == '{}') return;

        $this->assertContains('"id"', $response->getContent());
        $this->assertContains('"date"', $response->getContent());
        $this->assertContains('"neo_reference_id"', $response->getContent());
        $this->assertContains('"name"', $response->getContent());
        $this->assertContains('"speed"', $response->getContent());
        $this->assertContains('"is_hazardous"', $response->getContent());


    }
}
