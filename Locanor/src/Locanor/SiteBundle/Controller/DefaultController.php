<?php

namespace Locanor\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LocanorSiteBundle:Default:index.html.twig');
    }
}
