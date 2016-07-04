<?php

namespace OCC\PlatformBundle\Controller;

use OCC\Component\HttpFoundation\Response;

class AdvertController
{
  public function indexAction()
  {
    return new Response("Hello World !");
  }
}
