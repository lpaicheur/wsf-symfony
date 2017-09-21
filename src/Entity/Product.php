<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="product")
*/

class Product
{
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
    * @ORM\Column(type="integer")
    * @ORM\ManyToOne(targetEntity="App\Entity\Category")
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
    public function getCategory(): ?string
    {
				return $this->category;
    }

    public function setCategory(?int $id) {
      return $this->category = $id;
    }

    public function getImage() {
      return $this->image;
    }

    public function setImage($image) {
      return $this->image = $image;
    }
}
