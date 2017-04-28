<?php
/**
 * It collects the filters in an array,
 * for calling Nasa's Neo provider API.
 *
 * User: charan
 * Date: 28/4/17
 * Time: 2:53 PM
 */
namespace Neo\NasaBundle\Service\Neo\URI;
/**
 * Interface FilterCollectorInterface
 * @package Neo\NasaBundle\Service\Neo\URI
 */
interface FilterCollectorInterface {
    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function add($field, $value);

    /**
     * @return mixed
     */
    public function getAll();
}