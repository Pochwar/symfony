<?php

namespace HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HelloBundle:Default:index.html.twig');
    }

    public function listAction()
    {
        return new Response('list Action');
    }

    public function articleAction($slug, $_format)
    {
        if($_format == 'json'){
            return new JsonResponse(['success' => true, 'slug' => $slug]);
        }
        return new Response('super article : '. $slug);
    }
}
