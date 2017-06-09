<?php
/**
 * It formats the response returned by the Nasa's Neo provider API.
 *
 * User: charan
 * Date: 25/4/17
 * Time: 7:19 PM
 */

namespace Neo\NasaBundle\Service\Neo\Response;
use Neo\NasaBundle\Document\Neo;
use Neo\NasaBundle\Service\Neo\Response\FetchResponseHandlerInterface;

/**
 * Class FetchResponseHandler
 * @package Neo\NasaBundle\Service\Neo
 */
class FetchResponseHandler implements FetchResponseHandlerInterface
{
    /**
     * @var NeoCollector
     */
    protected $neoCollector;

    /**
     * FetchResponseHandler constructor.
     * @param $neoCollector
     */
    public function __construct(NeoCollector $neoCollector)
    {
        $this->neoCollector = $neoCollector;
    }

    /**
     * @param $response
     */
    protected function _verify($response) {
        $lastErrorCode = json_last_error();
        if ($lastErrorCode != JSON_ERROR_NONE) {
            $errorMessage = json_last_error_msg();
            throw new Exception($errorMessage, 500);
        }
        if (!isset($response->element_count)) {
            throw new Exception('No Data to Download!', 500);
        }
    }

    /**
     * @param $response
     * @return NeoCollector
     */
    public function call($response)
    {
        $response = json_decode($response);
        $this->_verify($response);

        foreach ($response->near_earth_objects as $date => $neosByDate) {
            foreach ($neosByDate as $rawNeo) {
                $neo = new Neo();
                $neo->setDate($date);

                if (isset($rawNeo->neo_reference_id)) {
                    $neo->setNeoReferenceId($rawNeo->neo_reference_id);
                }

                if (isset($rawNeo->name)) {
                    $neo->setName($rawNeo->name);
                }

                if (isset($rawNeo->is_potentially_hazardous_asteroid)) {
                    $neo->setIsHazardous($rawNeo->is_potentially_hazardous_asteroid);
                }

                if (isset($rawNeo->close_approach_data[0]->relative_velocity->kilometers_per_hour)) {
                    $neo->setSpeed($rawNeo->close_approach_data[0]->relative_velocity->kilometers_per_hour);
                }

                $this->neoCollector->add($neo);
            }
        }
        return $this->neoCollector;

    }

}