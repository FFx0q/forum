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
        private $id;

        /** 
         * @ORM\Column(type="string") 
         */
        private $name;

        /** 
         * @ORM\Column(type="string") 
         */
        private $member_password_hash;
        /**
         * @ORM\Column(type="string")
         */
        private $email;

        /**
         *  @ORM\Column(type="string")
         */
        private $join_date;


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