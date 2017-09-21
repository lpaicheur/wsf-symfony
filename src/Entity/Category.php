<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="category")
*/

class Category
{
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
}
