<?php

namespace Bookeeper\ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BookeeperManagerBundle:Default:index.html.twig');
    }
}
