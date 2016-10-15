<?php

namespace Katagena\GamificationBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Katagena\GamificationBundle\Entity\Badge;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Katagena\GamificationBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller {
    /**
     * @Route("/add", name="add")
     */
    public function addAction(Request $request) {
        $bId = $request->get ( 'bId' );
        $done = $request->get ( 'done' );
        $em = $this->getDoctrine ()->getManager ();

        /** @var Badge $badge */
        $badge = $this->getDoctrine()
            ->getRepository('KatagenaGamificationBundle:Badge')
            ->find($bId);
        if (!$badge) {
            throw $this->createNotFoundException(
                'No badge found for id '.$bId
                );
        }

        $event = new Event();
        $event->setBadge($badge);
        $event->setCreatedAt ( new \DateTime ( 'now' ) );
        $event->setDone($done);
        $em->persist ( $event );
        $em->flush ();

        $response = new JsonResponse ();
        $response->setData ( array (
            'id' => $event->getId ()
        ) );

        while (null !== $badge->getParent()) {
            $badge = $badge->getParent();
            $event = new Event();
            $event->setBadge($badge);
            $event->setCreatedAt ( new \DateTime ( 'now' ) );
            $event->setDone($done);
            $em->persist ( $event );
        }
        $em->flush ();

        return $response;
    }

    /**
     * @Route("/get", name="get")
     */
    public function getAction(Request $request) {
        $bId = $request->get ( 'bId' );
        $category = $this->getDoctrine ()->getRepository ( 'KatagenaGamificationBundle:Badge' )->find ( $bId );
        /** @var Badge $category */
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('parent'));
        $encoder = new JsonEncoder();
        $serializer = new Serializer(array($normalizer), array($encoder));
        $response = new JsonResponse();
        $response->setJson($serializer->serialize($category, 'json'));
        return $response;
    }

    /**
     * @Route("/progress", name="progress")
     */
    public function progressAction(Request $request) {
        $results = array();
        $pId = $request->get ( 'pId' );
        $uId = 0;
        $badges = $this->getDoctrine ()->getRepository ( 'KatagenaGamificationBundle:Event' )->findProgress($pId, $uId);
        foreach ($badges as $badge) {
            $results[$badge['2']] = $badge['1'];
        }
        $normalizer = new ObjectNormalizer();
        $encoder = new JsonEncoder();
        $serializer = new Serializer(array($normalizer), array($encoder));
        $response = new JsonResponse();
        $response->setJson($serializer->serialize($results, 'json'));
        return $response;
    }
}
