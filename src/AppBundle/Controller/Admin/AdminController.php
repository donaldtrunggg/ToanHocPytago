<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
  /**
   * @Route("/admin", name="admin_homepage")
   */
  public function indexAction(Request $request)
  {
    return $this->render('@App/back_office/index.html.twig');
  }

  /**
   * @Route("/admin/blog", name="admin_blog_list")
   */
  public function indexBlogAction(Request $request)
  {
    return $this->render('@App/back_office/blog/index.html.twig');
  }

  /**
   * @Route("/admin/blog/create", name="admin_blog_create")
   */
  public function createBlogAction(Request $request)
  {
    return $this->render('@App/back_office/blog/create.html.twig');
  }
}
