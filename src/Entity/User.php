<?php
    namespace App\Entity;
    
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     */
    class User
    {
        /** 
         * @ORM\Id 
         * @ORM\Column(type="integer") 
         * @ORM\GeneratedValue 
         */
        protected $pid;

        /** 
         * @ORM\Column(type="string") 
         */
        protected $name;

        /** 
         * @ORM\Column(type="string") 
         */
        protected $password;
        /**
         * @ORM\Column(type="string")
         */
        protected $email;

        /**
         *  @ORM\Column(type="string")
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
        
        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getJoinDate()
        {
            return $this->join_date;
        }

        public function setJoinDate($date)
        {
            $this->join_date = $date;
        }
    }
?>