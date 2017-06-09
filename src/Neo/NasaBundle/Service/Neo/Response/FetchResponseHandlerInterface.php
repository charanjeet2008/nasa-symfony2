<?php
/**
 * It formats the response returned by the Nasa's Neo provider API.
 *
 * User: charan
 * Date: 28/4/17
 * Time: 2:47 PM
 */
namespace Neo\NasaBundle\Service\Neo\Response;
use Neo\NasaBundle\Service\Neo\URI\FilterCollector;

/**
 * Interface NeoCollectorInterface
 * @package Neo\NasaBundle\Service
 */
interface FetchResponseHandlerInterface
{
    /**
     * @return mixed
     */
    public function call($response);

}