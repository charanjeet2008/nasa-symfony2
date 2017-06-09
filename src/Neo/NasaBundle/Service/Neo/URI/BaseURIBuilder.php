<?php
/**
 * It Builds the Base URI for Nasa's Neo provider API,
 * using the parameters passed from config.
 *
 * User: charan
 * Date: 25/4/17
 * Time: 6:38 PM
 */
namespace Neo\NasaBundle\Service\Neo\URI;

class BaseURIBuilder implements BaseURIBuilderInterface
{
    /**
     * @var string
     */
    protected $apiHost;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $apiPath;

    /**
     * BaseURIBuilder constructor.
     * @param $apiHost
     * @param $apiKey
     * @param $apiPath
     */
    public function __construct($apiHost, $apiKey, $apiPath)
    {
        $this->apiHost = $apiHost;
        $this->apiKey = $apiKey;
        $this->apiPath = $apiPath;
    }

    /**
    * @return string
    */
    public function call() {
        return $this->apiHost. $this->apiPath. '?api_key='. $this->apiKey;
    }
}
