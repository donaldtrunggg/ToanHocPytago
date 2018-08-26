<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlogRepository")
 */
class Blog
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
   * @ORM\Column(name="title", type="string", length=512)
   */
  private $title;

  /**
   * @var string
   *
   * @ORM\Column(name="url", type="string", length=512)
   */
  private $url;

  /**
   * @var string
   *
   * @ORM\Column(name="content", type="string", length=1024)
   */
  private $content;

  /**
   * @var string
   *
   * @ORM\Column(name="status", type="integer")
   */
  private $status;

  /**
   * @var string
   *
   * @ORM\Column(name="createdOn", type="datetime")
   */
  private $createdOn;

  /**
   * @var string
   *
   * @ORM\Column(name="updatedOn", type="datetime")
   */
  private $updatedOn;

  public function __construct()
  {
    $currentDate = new \DateTime();
    $this->createdOn = $currentDate;
    $this->updatedOn = $currentDate;
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
  public function getContent()
  {
    return $this->content;
  }

  /**
   * @param string $content
   */
  public function setContent($content)
  {
    $this->content = $content;
  }

  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * @param string $status
   */
  public function setStatus($status)
  {
    $this->status = $status;
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

  /**
   * @return string
   */
  public function getUpdatedOn()
  {
    return $this->updatedOn;
  }

  /**
   * @param string $updatedOn
   */
  public function setUpdatedOn($updatedOn)
  {
    $this->updatedOn = $updatedOn;
  }

  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * @param string $title
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }

  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }

  /**
   * @param string $url
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }

}