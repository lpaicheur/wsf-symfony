<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity()
 * @ORM\Table(name="product")
 * @ApiResource
*/

class Product
{
  public function __toString()
  {
      return $this->name;
  }
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @Assert\NotBlank()
    * @ORM\Column(type="string", length=100)
    */
    private $name;

    /**
    * @Assert\NotBlank()
    * @ORM\Column(type="integer")
    */
    private $price;

    /**
    * @Assert\NotBlank()
    * @ORM\Column(type="text")
    */
    private $description;

    /**
    * @Assert\NotBlank()
    * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
    * @ORM\JoinColumn(name="category", referencedColumnName="id")
    */
    private $category;

    /**
    * @Assert\NotBlank()
    * @Assert\Image()
    * @ORM\Column(type="string")
    *
    * @var string
    */
    private $image;


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
    public function getName(): ?string
    {
				return $this->name;
		}

		/**
		* @param string $name
		*/
		public function setName(string $name)
		{
				$this->name = $name;
		}

    /**
    * @return string
    */
    public function getDescription(): ?string
    {
				return $this->description;
    }

    public function setDescription(?string $description) {
      return $this->description = $description;
    }

    /**
    * @return int
    */
    public function getPrice(): ?int
    {
				return $this->price;
    }

    public function setPrice(?int $price) {
      return $this->price = $price;
    }

    /**
    * @return int
    */
    public function getCategory()
    {
				return $this->category;
    }

    public function setCategory($id) {
      return $this->category = $id;
    }

    public function getImage(): ?string
    {
      return $this->image;
    }

    public function setImage(string $image)
    {
      return $this->image = $image;
    }
}
