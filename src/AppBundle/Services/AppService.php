<?php
namespace AppBundle\Services;

use AppBundle\Util\ServiceUtil;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class AppService
{
  private $request;
  private $entityManager;
  private $container;
  private $translator;
  private $tokenStorage;
  private $logger;

  public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack,
                              TokenStorageInterface $tokenStorage, ContainerInterface $container, LoggerInterface $logger)
  {
    $this->container = $container;
    $this->tokenStorage = $tokenStorage;
    $this->entityManager = $entityManager;
    $this->request = $requestStack->getCurrentRequest();
    $this->logger = $logger;

    $this->translator = $this->container->get(ServiceUtil::TRANSLATOR_SERVICE);
  }

  public function getRequest()
  {
    return $this->request;
  }

  public function getEntityManager()
  {
    return $this->entityManager;
  }

  public function getContainer()
  {
    return $this->container;
  }

  public function getTranslator()
  {
    return $this->translator;
  }


  public function getFileService()
  {
    $fileSystem = $this->getFileSystem();
    return $this->container->get($fileSystem);
  }

  /**
   * @return string
   */
  public function getRootDir()
  {
    return $this->getContainer()->get('kernel')->getRootDir() . '/..';
  }

  public function getLogger()
  {
    return $this->logger;
  }
}