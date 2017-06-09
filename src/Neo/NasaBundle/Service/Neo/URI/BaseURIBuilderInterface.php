<?php
/**
 * It Builds the Base URI for Nasa's Neo provider API,
 * using the parameters passed from config.
 *
 * User: charan
 * Date: 28/4/17
 * Time: 2:53 PM
 */
namespace Neo\NasaBundle\Service\Neo\URI;
/**
 * Interface BaseURIBuilderInterface
 */
interface BaseURIBuilderInterface {
    /**
     * @return mixed
     */
    public function call();
}