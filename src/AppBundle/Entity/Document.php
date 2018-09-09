<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Table(name="document")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DocumentRepository")
 */
class Document
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
   * @var int
   *
   * @ORM\Column(name="categoryId", type="integer")
   */
  private $categoryId;

  /**
   * @var string
   *
   * @ORM\Column(name="publicLink", type="string", length=512)
   * @Assert\NotBlank(message="Please, upload the file as a PDF file.")
   */
  private $publicLink;

  /**
   * @var string
   *
   * @ORM\Column(name="originalName", type="string")
   */
  private $originalName;

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
  public function getPublicLink()
  {
    return $this->publicLink;
  }

  /**
   * @param string $publicLink
   */
  public function setPublicLink($publicLink)
  {
    $this->publicLink = $publicLink;
  }

  /**
   * @return string
   */
  public function getOriginalName()
  {
    return $this->originalName;
  }

  /**
   * @param string $originalName
   */
  public function setOriginalName($originalName)
  {
    $this->originalName = $originalName;
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