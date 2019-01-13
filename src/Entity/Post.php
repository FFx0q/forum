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
         * @ORM\OneToOne(targetEntity="User")
         */
        
        private $author;
        /**
         * @ORM\OneToOne(targetEntity="Topic")
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

        public function getId()
        {
            return $this->pid;
        }

        public function getPost()
        {
            return $this->post();
        }

        public function setPost($post)
        {
            $this->post = $post;
        }

        public function getCreated()
        {
            return $this->created;
        }

        public function setCreated($created)
        {
            $this->created = $created;
        }
    }