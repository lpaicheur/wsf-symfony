<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
// use Doctrine\Common\Collections\Collection as ArrayCollection;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity()
 * @ORM\Table(name="category")
 * @ApiResource
*/

class Category
{
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

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
     * @ORM\Column(type="string", length=100)
    */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
    */
    private $products;

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
     * @return Collection
    */
    public function getProducts()
    {
      return $this->products;
    }

    /**
     * @param Collection $products
    */
    public function setProducts($products)
    {
        $this->products = $products;
    }
}
