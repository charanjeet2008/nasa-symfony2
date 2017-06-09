<?php
/**
 * It builds the Fetch URI for Nasa's Neo provider API,
 * using Filters and BaseURI.
 *
 * User: charan
 * Date: 25/4/17
 * Time: 6:54 PM
 */
namespace Neo\NasaBundle\Service\Neo\URI;
use Neo\NasaBundle\Service\Neo\URI\FilterURIBuilderInterface;


/**
 * Class FetchURIBuilder
 * @package Neo\NasaBundle\Service\Neo
 */
class FetchURIBuilder implements FetchURIBuilderInterface {
    /**
     * @var BaseURIBuilder
     */
    protected $baseURIBuilder;

    /**
     * FetchURIBuilder constructor.
     * @param BaseURIBuilder $baseURIBuilder
     */
    public function __construct(BaseURIBuilder $baseURIBuilder) {
        $this->baseURIBuilder = $baseURIBuilder;
    }

    /**
     * @param FilterCollector $filters
     * @return string
     */
    public function call(FilterCollector $filters) {
        $filtersCollection = $filters->getAll();
        $filtersURI = http_build_query($filtersCollection);
        $baseURI = $this->baseURIBuilder->call();
        return $baseURI . '&' . $filtersURI;

    }

}