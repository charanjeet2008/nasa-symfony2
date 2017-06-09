<?php
/**
 * It calls the Nasa's Neo provider API,
 * using FetchURI.
 *
 * User: charan
 * Date: 25/4/17
 * Time: 6:17 PM
 */

namespace Neo\NasaBundle\Service\Neo\Call;

use Neo\NasaBundle\Service\Neo\URI\FilterCollector;
use Neo\NasaBundle\Service\Neo\URI\FetchURIBuilder;

/**
 * Class FetchAPICaller
 * @package Neo\NasaBundle\Service\Neo
 */
class FetchAPICaller implements FetchAPICallerInterface
{
    protected $fetchURIBuilder;

    /**
     * FetchAPICaller constructor.
     * @param FetchURIBuilder $fetchURIBuilder
     */
    public function __construct(FetchURIBuilder $fetchURIBuilder)
    {
        $this->fetchURIBuilder = $fetchURIBuilder;
    }

    /**
     * @param FilterCollector $filters
     * @return \Psr\Http\Message\StreamInterface
     */
    public function call(FilterCollector $filters) {
        $uri = $this->fetchURIBuilder->call($filters);
        $client = new \GuzzleHttp\Client();
        $res = $client->get($uri);
        return $res->getBody();
    }
}

