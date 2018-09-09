<?php

namespace AppBundle\Services;

use AppBundle\Entity\Blog;

class BlogService extends AppService
{
  public function findByCriteria($criteria = [])
  {
    $blogRepo = $this->getEntityManager()->getRepository(Blog::class);
    return $blogRepo->findBy($criteria);
  }

  public function findOneByCriteria($criteria)
  {
    $blogRepo = $this->getEntityManager()->getRepository(Blog::class);
    return $blogRepo->findOneBy($criteria);
  }

  public function insert(Blog $blog)
  {
    $this->getEntityManager()->persist($blog);
    $this->getEntityManager()->flush();
  }

  public function update(Blog $blog)
  {
    $blog->setUpdatedOn(new \DateTime());

    $this->getEntityManager()->persist($blog);
    $this->getEntityManager()->flush();
  }
}