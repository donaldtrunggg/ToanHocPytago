<?php

namespace AppBundle\Services;

use AppBundle\Entity\RegistrationInfo;

class RegistrationInfoService extends AppService
{
  public function findByCriteria($criteria = [])
  {
    $registrationInfoRepo = $this->getEntityManager()->getRepository(RegistrationInfo::class);
    return $registrationInfoRepo->findBy($criteria);
  }

  public function findOneByCriteria($criteria)
  {
    $registrationInfoRepo = $this->getEntityManager()->getRepository(RegistrationInfo::class);
    return $registrationInfoRepo->findOneBy($criteria);
  }

  public function insert(RegistrationInfo $blog)
  {
    $this->getEntityManager()->persist($blog);
    $this->getEntityManager()->flush();
  }
}