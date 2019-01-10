<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     */
    class Subcategory 
    {
        /** 
         * @ORM\Id 
         * @ORM\Column(type="integer") 
         * @ORM\GeneratedValue 
         */
        private $id;


        /**
         * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="subcategories")
         */
        private $category;

        /** 
         * @ORM\Column(type="string") 
         */
        private $title;

        public function getId()
        {
            return $this->sid;
        }
        public function getCategory()
        {
            return $this->category;
        }
        
        public function setCategory(Category $category = null)
        {
            $this->category = $category;

            return $this;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }
    }