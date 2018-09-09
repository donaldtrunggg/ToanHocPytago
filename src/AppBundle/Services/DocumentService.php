<?php

namespace AppBundle\Services;

use AppBundle\Entity\Document;

class DocumentService extends AppService
{
  public function findByCriteria($criteria = [])
  {
    $documentRepo = $this->getEntityManager()->getRepository(Document::class);
    return $documentRepo->findBy($criteria);
  }

  public function findOneByCriteria($criteria)
  {
    $documentRepo = $this->getEntityManager()->getRepository(Document::class);
    return $documentRepo->findOneBy($criteria);
  }

  public function insert(Document $document)
  {
    $file = $document->getPublicLink();
    $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
    $originalName = $document->getPublicLink()->getClientOriginalName();

    $file->move(
      $this->getContainer()->getParameter('document_directory'),
      $fileName
    );

    $document->setOriginalName($originalName);
    $document->setPublicLink($fileName);

    $this->getEntityManager()->persist($document);
    $this->getEntityManager()->flush();
  }

  public function remove($id)
  {
    $criteria = array(
      'id' => $id
    );

    $document = $this->findOneByCriteria($criteria);
    $this->getEntityManager()->remove($document);
    $this->getEntityManager()->flush();
  }
}