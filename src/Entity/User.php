<?php
    namespace App\Entity;
    /**
     * @Entity
     */
    class User
    {
        /** 
         * @Id 
         * @Column(type="integer") 
         * @GeneratedValue 
         */
        protected $pid;

        /** 
         * @Column(type="string") 
         */
        protected $name;

        /** 
         * @Column(type="string") 
         */
        protected $password;

        /**
         *  @Column(type="datetime")
         */
        protected $join_date;


        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getJoinDate()
        {
            return $this->join_date;
        }

        public function setJoinDate()
        {
            $this->join_date = $date;
        }
    }
?>