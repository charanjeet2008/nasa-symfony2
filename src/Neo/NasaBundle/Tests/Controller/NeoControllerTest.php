<?php
/**
 * It tests the Neo Controllers' actions
 *
 * User: charan
 * Date: 28/4/17
 * Time: 4:45 PM
 */

namespace Neo\NasaBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class NeoControllerTest extends WebTestCase
{
    public function setUp() {
        $classes = array(
            'Neo\NasaBundle\DataFixtures\MongoDB\DataLoader'
        );
        $this->loadFixtures($classes, null, 'doctrine_mongodb');

    }
    public function testGetHazardous()
    {
        $client = static::createClient();

        $client->request('GET', '/neo/hazardous');

        $response = $client->getResponse();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('application/json', $response->headers->get('Content-Type'));

        $responseContent = $response->getContent();
        if ($responseContent == '{}') return;

        $this->assertContains('"id"', $responseContent);
        $this->assertContains('"date"', $responseContent);
        $this->assertContains('"neo_reference_id"', $responseContent);
        $this->assertContains('"name"', $responseContent);
        $this->assertContains('"speed"', $responseContent);
        $this->assertContains('"is_hazardous"', $responseContent);

        $neos = json_decode($responseContent);
        $this->assertSame(2, count($neos));
        $this->assertSame('3744792', $neos[0]->name);
        $this->assertSame('789837', $neos[1]->name);
    }

    public function testGetFastest()
    {
        $client = static::createClient();

        $client->request('GET', '/neo/fastest');

        $response = $client->getResponse();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('application/json', $response->headers->get('Content-Type'));

        $responseContent = $response->getContent();
        if ($responseContent == '{}') return;

        $this->assertContains('"id"', $responseContent);
        $this->assertContains('"date"', $responseContent);
        $this->assertContains('"neo_reference_id"', $responseContent);
        $this->assertContains('"name"', $responseContent);
        $this->assertContains('"speed"', $responseContent);
        $this->assertContains('"is_hazardous"', $responseContent);

        $neos = json_decode($responseContent);

        $this->assertSame(1, count($neos));
        $this->assertSame('3744792', $neos->name);

    }
}
