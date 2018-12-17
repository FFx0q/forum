<?php
    namespace App\Entity;
    /**
     * @Entity
     */
    class Category 
    {
        /** 
         * @Id 
         * @Column(type="integer") 
         * @GeneratedValue 
         */
        protected $cid;

        /** 
         * @Column(type="string") 
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