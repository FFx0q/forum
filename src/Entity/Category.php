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
         * @ORM\OneToMany(targetEntity="App\Entity\Forum", mappedBy="category")
         */
        private $forums;

        public function __construct()
        {
            $this->forums = new ArrayCollection();
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of Forums /*
         */ 
        public function getForums() : Collection
        {
                return $this->forums;
        }
    }