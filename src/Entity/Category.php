<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     */
    class Category 
    {
        /** 
         * @ORM\Id 
         * @ORM\Column(type="integer") 
         * @ORM\GeneratedValue 
         */
        protected $cid;

        /** 
         * @ORM\Column(type="string") 
         */
        protected $title;

        public function getId()
        {
            return $this->cid;
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