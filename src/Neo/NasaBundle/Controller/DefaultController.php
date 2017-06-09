<?php
/**
 * Default Controller and hello world Action
 *
 * User: charan
 * Date: 25/4/17
 * Time: 5:00 PM
 */


namespace Neo\NasaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        try {
            return new JsonResponse([
                'hello' => "world!"
            ]);
        } catch (Exception $exception) {
            return new JsonResponse([
                'success' => false,
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
            ]);
        }
    }

}
