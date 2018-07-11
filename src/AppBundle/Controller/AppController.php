<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AppController extends Controller
{
  /**
   * @Route("/", name="homepage")
   */
  public function indexAction(Request $request)
  {
    return $this->render('default/index.html.twig', [
      'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
    ]);
  }

  /**
   * @Route("/home", name="homepage2")
   */
  public function homeAction(Request $request)
  {
    $numbers = [1, 2, 3, 5];

    return $this->render('@App/front_office/index.html.twig', array(
      'numbers' => $numbers
    ));
  }
}
