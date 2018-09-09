<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="registration_info")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RegistrationInfoRepository")
 */
class RegistrationInfo
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @ORM\Column(name="name", type="string", length=512)
   */
  private $name;

  /**
   * @var string
   *
   * @ORM\Column(name="sdt", type="string", length=512)
   */
  private $sdt;

  /**
   * @var string
   *
   * @ORM\Column(name="email", type="string", length=1024)
   */
  private $email;

  /**
   * @var int
   *
   * @ORM\Column(name="categoryId", type="integer")
   */
  private $categoryId;

  /**
   * @var string
   *
   * @ORM\Column(name="note", type="string", length=1024)
   */
  private $note;

  /**
   * @var string
   *
   * @ORM\Column(name="createdOn", type="datetime")
   */
  private $createdOn;

  public function __construct()
  {
    $currentDate = new \DateTime();
    $this->createdOn = $currentDate;
  }

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return string
   */
  public function getSdt()
  {
    return $this->sdt;
  }

  /**
   * @param string $sdt
   */
  public function setSdt($sdt)
  {
    $this->sdt = $sdt;
  }

  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   * @return int
   */
  public function getCategoryId()
  {
    return $this->categoryId;
  }

  /**
   * @param int $categoryId
   */
  public function setCategoryId($categoryId)
  {
    $this->categoryId = $categoryId;
  }

  /**
   * @return string
   */
  public function getNote()
  {
    return $this->note;
  }

  /**
   * @param string $note
   */
  public function setNote($note)
  {
    $this->note = $note;
  }

  /**
   * @return string
   */
  public function getCreatedOn()
  {
    return $this->createdOn;
  }

  /**
   * @param string $createdOn
   */
  public function setCreatedOn($createdOn)
  {
    $this->createdOn = $createdOn;
  }
}