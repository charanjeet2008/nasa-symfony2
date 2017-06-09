<?php
/**
 * It collects Neo's returned by Nasa's Neo provider API.
 *
 * User: charan
 * Date: 26/4/17
 * Time: 1:55 PM
 */

namespace Neo\NasaBundle\Service\Neo\Response;
use Neo\NasaBundle\Document\Neo;

/**
 * Interface NeoCollectorInterface
 * @package Neo\NasaBundle\Service
 */
interface NeoCollectorInterface
{
    /**
     * @return mixed
     */
    public function add(Neo $value);

    /**
     * @return mixed
     */
    public function getAll();
}