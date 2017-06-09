<?php
/**
 * Neo Controller's hazardous/ and fastest/ actions
 *
 * User: charan
 * Date: 25/4/17
 * Time: 6:02 PM
 */

namespace Neo\NasaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class NeoController
 * @package Neo\NasaBundle\Controller
 */
class NeoController extends Controller
{
    /**
     * @Route("neo/hazardous")
     * @return JsonResponse
     */
    public function getHazardousAction()
    {
        $neoList = $this->get('doctrine_mongodb')
                        ->getRepository('NasaBundle:Neo')
                        ->findByIsHazardous(true);

        $response = new JsonResponse($neoList);

        return $response;
    }

    /**
     * @Route("neo/fastest")
     * @return JsonResponse
     */
    public function getFastestAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $neo = $dm
                ->createQueryBuilder('NasaBundle:Neo')
                ->sort('speed', 'desc')
                ->getQuery()
                ->getSingleResult();

        $response = new JsonResponse($neo);

        return $response;
    }
}

