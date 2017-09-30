<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity()
 * @ORM\Table(name="comment")
 * @ApiResource
*/

class Comment
{
  public function __toString()
  {
      return $this->description;
  }
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $id;

  /**
   * @ORM\Column(type="text")
  */
  private $description;

  /**
    * @ORM\ManyToOne(targetEntity="Product", inversedBy="comments")
    * @ORM\JoinColumn(name="product", referencedColumnName="id")
  */
  private $product;

  /**
    * @return int
  */
  public function getId(): ?int
  {
      return $this->id;
  }

  /**
    * @return string
  */
  public function getDescription(): ?string
  {
      return $this->description;
  }

  /**
    * @return string
  */
  public function setDescription(string $description): ?string
  {
      return $this->description = $description;
  }

  /**
    * @return string
  */
  public function getProduct()
  {
      return $this->product;
  }

  public function setProduct($product)
  {
      return $this->product = $product;
  }
}
