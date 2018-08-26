<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\BlogType;
use AppBundle\Util\MessageUtil;
use AppBundle\Util\ServiceUtil;
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
    $a = $this->get(ServiceUtil::BLOG_SERVICE)->getAll();
    return $this->render('@App/back_office/index.html.twig');
  }

  /**
   * @Route("/admin/blog", name="admin_blog_list")
   */
  public function indexBlogAction(Request $request)
  {
    $blogs = $this->get(ServiceUtil::BLOG_SERVICE)->findByCriteria();

    return $this->render('@App/back_office/blog/index.html.twig', array(
      'blogs' => $blogs
    ));
  }

  /**
   * @Route("/admin/blog/create", name="admin_blog_create")
   */
  public function createBlogAction(Request $request)
  {
    $form = $this->createForm(BlogType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $session = $request->getSession();

      try {
        $this->get(ServiceUtil::BLOG_SERVICE)->insert($form->getData());
        $session->getFlashBag()->add(MessageUtil::SUCCESS_KEY, MessageUtil::SUCCESS_CREATE_STRING);
        return $this->redirectToRoute('admin_blog_list');
      } catch (\Exception $e) {
        $session->getFlashBag()->add(MessageUtil::ERROR_KEY, $e->getMessage());
      }
    }

    return $this->render('@App/back_office/blog/create.html.twig', array(
      'form' => $form->createView()
    ));
  }

  /**
   * @Route("/admin/blog/update/{id}", name="admin_blog_update")
   */
  public function updateBlogAction(Request $request, $id)
  {
    $criteria = array(
      'id' => $id
    );

    $blog = $this->get(ServiceUtil::BLOG_SERVICE)->findOneByCriteria($criteria);
    $form = $this->createForm(BlogType::class, $blog);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $session = $request->getSession();

      try {
        $this->get(ServiceUtil::BLOG_SERVICE)->update($form->getData());
        $session->getFlashBag()->add(MessageUtil::SUCCESS_KEY, MessageUtil::SUCCESS_UPDATE_STRING);
        return $this->redirectToRoute('admin_blog_list');
      } catch (\Exception $e) {
        $session->getFlashBag()->add(MessageUtil::ERROR_KEY, $e->getMessage());
      }
    }

    return $this->render('@App/back_office/blog/create.html.twig', array(
      'form' => $form->createView()
    ));
  }
}
