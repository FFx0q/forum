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
        protected $pid;

        /** 
         * @ORM\Column(type="integer") 
         */
        protected $tid;

        /** 
         * @ORM\Column(type="integer") 
         */
        protected $author_id;

         /** 
          * @ORM\Column(type="string") 
          */
        protected $post;

        /**
         *  @ORM\Column(type="datetime")
         */
        protected $created;

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