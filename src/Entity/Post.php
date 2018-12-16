<?php
    /**
     * @Entity @Table(name="posts")
     **/
    class Post 
    {
        /** 
         * @Id 
         * @Column(type="integer") 
         * @GeneratedValue 
         */
        protected $pid;

        /** 
         * @Column(type="integer") 
         */
        protected $tid;

        /** 
         * @Column(type="integer") 
         */
        protected $author_id;

         /** 
          * @Column(type="string") 
          */
        protected $post;

        /**
         *  @Columnt(type="datetime")
         */
        protected $created;

        public function getId()
        {
            return $this->id;
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