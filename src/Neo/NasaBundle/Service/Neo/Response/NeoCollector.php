<?php
/**
 * It collects the NEOs returned in an array.
 *
 * User: charan
 * Date: 26/4/17
 * Time: 12:45 PM
 */

namespace Neo\NasaBundle\Service\Neo\Response;

use Neo\NasaBundle\Document\Neo;

/**
 * Class NeoCollector
 * @package Neo\NasaBundle\Service\Neo
 */
class NeoCollector implements NeoCollectorInterface
{
    private $neos = array();

    /**
     * @param Neo $neo
     */
    public function add(Neo $neo) {
        $this->neos[] = $neo;
    }

    /**
     * @return array
     */
    public function getAll() {
        return $this->neos;
    }

    /**
     * @return int
     */
    public function getCount() {
        return count($this->neos);
    }
}
