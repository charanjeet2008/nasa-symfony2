<?php
/**
 * It collects the filters in an array,
 * for calling Nasa's Neo provider API.
 *
 * User: charan
 * Date: 25/4/17
 * Time: 5:36 PM
 */

namespace Neo\NasaBundle\Service\Neo\URI;


class FilterCollector
{
    /**
     * @var array
     */
    protected $filters;

    /**
     * @param $field
     * @param $value
     */
    public function add($field, $value)
    {
        $this->filters[$field] = $value;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->filters;
    }

}