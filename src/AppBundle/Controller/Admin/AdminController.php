<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\BlogType;
use AppBundle\Form\DocumentType;
use AppBundle\Util\MessageUtil;
use AppBundle\Util\ServiceUtil;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends Controller
{
  /**
   * @Route("/login", name="admin_login")
   */
  public function loginAction(AuthenticationUtils $authenticationUtils)
  {
    return $this->render('@App/back_office/login.html.twig');
  }

  /**
   * @Route("/admin", name="admin_homepage")
   */
  public function indexAction(Request $request)
  {
    $a = $this->get(ServiceUtil::BLOG_SERVICE)->findByCriteria();
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
      dump($form);
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

  /**
   * @Route("/admin/blog/delete", name="admin_blog_delete")
   */
  public function deleteBlogAction(Request $request)
  {
    try {
      $id = $request->request->get('id');
      $this->get(ServiceUtil::BLOG_SERVICE)->remove($id);
    } catch (\Exception $e) {
      $message = MessageUtil::formatMessage(MessageUtil::FAIL, $e->getMessage());
      return new JsonResponse($message);
    }

    $message = MessageUtil::formatMessage(MessageUtil::SUCCESS, MessageUtil::SUCCESS_KEY, '');
    return new JsonResponse($message);
  }

  /**
   * @Route("/admin/document", name="admin_document_list")
   */
  public function indexDocumentAction(Request $request)
  {
    $documents = $this->get(ServiceUtil::DOCUMENT_SERVICE)->findByCriteria();

    return $this->render('@App/back_office/document/index.html.twig', array(
      'documents' => $documents
    ));
  }

  /**
   * @Route("/admin/document/create", name="admin_document_create")
   */
  public function createDocumentAction(Request $request)
  {
    $form = $this->createForm(DocumentType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $session = $request->getSession();

      try {
        $this->get(ServiceUtil::DOCUMENT_SERVICE)->insert($form->getData());
        $session->getFlashBag()->add(MessageUtil::SUCCESS_KEY, MessageUtil::SUCCESS_CREATE_STRING);
        return $this->redirectToRoute('admin_document_list');
      } catch (\Exception $e) {
        $session->getFlashBag()->add(MessageUtil::ERROR_KEY, $e->getMessage());
      }
    }

    return $this->render('@App/back_office/document/create.html.twig', array(
      'form' => $form->createView()
    ));
  }

  /**
   * @Route("/admin/document/delete", name="admin_document_delete")
   */
  public function deleteDocumentAction(Request $request)
  {
    try {
      $id = $request->request->get('id');
      $this->get(ServiceUtil::DOCUMENT_SERVICE)->remove($id);
    } catch (\Exception $e) {
      $message = MessageUtil::formatMessage(MessageUtil::FAIL, $e->getMessage());
      return new JsonResponse($message);
    }

    $message = MessageUtil::formatMessage(MessageUtil::SUCCESS, MessageUtil::SUCCESS_KEY, '');
    return new JsonResponse($message);
  }

  /**
   * @Route("/admin/user-register", name="admin_user_register_list")
   */
  public function indexUserRegisterAction(Request $request)
  {
    $registrationInfo = $this->get(ServiceUtil::REGISTRATION_INFO_SERVICE)->findByCriteria([], ['updatedOn' => 'DESC']);

    return $this->render('@App/back_office/user/registration_info.html.twig', array(
      'users' => $registrationInfo
    ));
  }
}
