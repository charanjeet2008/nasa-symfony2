<?php
/**
 * It downloads the Nasa's Neos,
 * given the Filters,
 * using FetchAPICaller and FetchResponseHandler.
 *
 * User: charan
 * Date: 28/4/17
 * Time: 2:53 PM
 */
namespace Neo\NasaBundle\Service\Neo;
use Neo\NasaBundle\Service\Neo\URI\FilterCollector;
/**
 * Interface DownloaderInterface
 */
interface DownloaderInterface {
    /**
     * @param FilterCollector $filters
     * @return mixed
     */
    public function call(FilterCollector $filters);
}
