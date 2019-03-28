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
         * @ORM\ManyToOne(targetEntity="Question")
         */
        private $question;

         /** 
          * @ORM\Column(type="string") 
          */
        private $post;

        /**
         *  @ORM\Column(type="string")
         */
        private $post_date;
        
        /**
         * @ORM\Column(type="integer")
         */
        private $votes;

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
        public function getQuestion()
        {
                return $this->question;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function setQuestion($question)
        {
                $this->question = $question;

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
        public function getPostDate()
        {
                return $this->post_date;
        }

        /**
         * Set the value of post_date
         *
         * @return  self
         */ 
        public function setPostDate($post_date)
        {
                $this->post_date = $post_date;

                return $this;
        }
        public function getVotes($votes)
        {
                return $this->votes;
        }

        public function setVotes($votes)
        {
                $this->votes = $votes;

                return $this;
        }

    }