<?php
/**
 * It calls the Nasa's Neo provider API,
 * using FetchURI.
 *
 * User: charan
 * Date: 28/4/17
 * Time: 2:38 PM
 */
namespace Neo\NasaBundle\Service\Neo\Call;
use Neo\NasaBundle\Service\Neo\URI\FilterCollector;

/**
 * Interface NeoCollectorInterface
 * @package Neo\NasaBundle\Service
 */
interface FetchAPICallerInterface
{
    /**
     * @return mixed
     */
    public function call(FilterCollector $filters);

}