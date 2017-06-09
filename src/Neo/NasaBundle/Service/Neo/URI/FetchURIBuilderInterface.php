<?php
/**
 * It builds the Fetch URI for Nasa's Neo provider API,
 * using Filters and BaseURI.
 *
 * User: charan
 * Date: 28/4/17
 * Time: 2:53 PM
 */
namespace Neo\NasaBundle\Service\Neo\URI;
/**
 * Interface FetchURIBuilderInterface
 */
interface FetchURIBuilderInterface {
    /**
     * @param FilterCollector $filters
     * @return mixed
     */
    public function call(FilterCollector $filters);
}