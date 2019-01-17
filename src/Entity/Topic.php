<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;

    /**
     * @ORM\Entity
     */
    class Topic 
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer", name="id")
         * @ORM\GeneratedValue
         */
        private $id;

        /**
         * @ORM\ManyToOne(targetEntity="User")
         */
        
        private $author;
        /**
         * @ORM\ManyToOne(targetEntity="Forum")
         */
        private $forum;

        /**
         * @ORM\Column(type="string")
         */
        private $title;

        /**
         *  @ORM\Column(type="string")
         */
        private $topic_date;

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of author
         */ 
        public function getAuthor()
        {
                return $this->author;
        }

        /**
         * Set the value of author
         *
         * @return  self
         */ 
        public function setAuthor($author)
        {
                $this->author = $author;

                return $this;
        }

        /**
         * Get the value of subcategory
         */ 
        public function getForum()
        {
                return $this->forum;
        }

        /**
         * Set the value of subcategory
         *
         * @return  self
         */ 
        public function setSubcategory($subcategory)
        {
                $this->subcategory = $subcategory;

                return $this;
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
         * Get the value of topic_date
         */ 
        public function getTopic_date()
        {
                return $this->topic_date;
        }

        /**
         * Set the value of topic_date
         *
         * @return  self
         */ 
        public function setTopic_date($topic_date)
        {
                $this->topic_date = $topic_date;

                return $this;
        }
    }