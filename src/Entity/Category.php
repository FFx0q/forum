<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;

    /**
     * @ORM\Entity
     */
    class Category 
    {

        /**
         * @ORM\Id
         * @ORM\Column(type="integer", name="id")
         * @ORM\GeneratedValue
         */
        private $id;

        /**
         * @ORM\Column(type="string")
         */
        private $title;

        /*
         * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="category")
         */
        private $subcategories;

        public function __construct()
        {
            $this->subcategories = new ArrayCollection();
        }

        public function getId()
        {
            return $this->id;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function getTitle()
        {
            return $this->title;
        }
        public function getSubcategories(): Collection
        {
            return $this->subcategories;
        }
    }