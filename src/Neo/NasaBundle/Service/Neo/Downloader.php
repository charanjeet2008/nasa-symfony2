<?php
/**
 * It downloads the Nasa's Neos,
 * given the Filters,
 * using FetchAPICaller and FetchResponseHandler.
 *
 * User: charan
 * Date: 25/4/17
 * Time: 5:55 PM
 */

namespace Neo\NasaBundle\Service\Neo;

use Neo\NasaBundle\Service\Neo\URI\FilterCollector;
use Neo\NasaBundle\Service\Neo\Response\FetchResponseHandler;
use Neo\NasaBundle\Service\Neo\Call\FetchAPICaller;

/**
 * Class Downloader
 * @package Neo\NasaBundle\Service\Neo
 */
class Downloader implements DownloaderInterface
{
    /**
     * @var FetchAPICaller
     */
    protected $fetchAPICaller;
    /**
     * @var FetchResponseHandler
     */
    protected $fetchResponseHandler;

    /**
     * Downloader constructor.
     * @param FetchAPICaller $fetchAPICaller
     * @param FetchResponseHandler $fetchResponseHandler
     */
    public function __construct(FetchAPICaller $fetchAPICaller, FetchResponseHandler $fetchResponseHandler)
    {
        $this->fetchAPICaller = $fetchAPICaller;
        $this->fetchResponseHandler = $fetchResponseHandler;
    }

    /**
     * @param FilterCollector $filters
     * @return NeoCollector
     */
    public function call(FilterCollector $filters)
    {
        $response = $this->fetchAPICaller->call($filters);
        return $this->fetchResponseHandler->call($response);
    }

}
