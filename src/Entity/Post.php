<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     **/
    class Post 
    {
        /** 
         * @ORM\Id 
         * @ORM\Column(type="integer") 
         * @ORM\GeneratedValue 
         */
        private $id;

        /**
         * @ORM\ManyToOne(targetEntity="User")
         */
        
        private $author;
        /**
         * @ORM\ManyToOne(targetEntity="Topic")
         */
        private $topic;

         /** 
          * @ORM\Column(type="string") 
          */
        private $post;

        /**
         *  @ORM\Column(type="string")
         */
        private $post_date;

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
         * Get the value of topic
         */ 
        public function getTopic()
        {
                return $this->topic;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function setTopic($topic)
        {
                $this->topic = $topic;

                return $this;
        }

        /**
         * Get the value of post
         */ 
        public function getPost()
        {
                return $this->post;
        }

        /**
         * Set the value of post
         *
         * @return  self
         */ 
        public function setPost($post)
        {
                $this->post = $post;

                return $this;
        }

        /**
         * Get the value of post_date
         */ 
        public function getPost_date()
        {
                return $this->post_date;
        }

        /**
         * Set the value of post_date
         *
         * @return  self
         */ 
        public function setPost_date($post_date)
        {
                $this->post_date = $post_date;

                return $this;
        }
    }