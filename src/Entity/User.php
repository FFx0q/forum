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
         * @ORM\Column(type="smallint") 
         * @ORM\GeneratedValue 
         */
        private $id;

        /**
         * @ORM\ManyToOne(targetEntity="Groups")
         */
        private $group;
        
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

        /**
         *  @ORM\Column(type="string")
         */
        private $avatar_url;

        /**
         * @ORM\Column(type="integer")
         */
        private $reputation;
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of member_password_hash
         */ 
        public function getPassword()
        {
                return $this->member_password_hash;
        }

        /**
         * Set the value of member_password_hash
         *
         * @return  self
         */ 
        public function setPassword($member_password_hash)
        {
                $this->member_password_hash = $member_password_hash;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of join_date
         */ 
        public function getJoinDate()
        {
                return $this->join_date;
        }

        /**
         * Set the value of join_date
         *
         * @return  self
         */ 
        public function setJoinDate($join_date)
        {
                $this->join_date = $join_date;

                return $this;
        }

        /**
         * Get the value of avatar_url
         */ 
        public function getAvatar_url()
        {
                return $this->avatar_url;
        }

        /**
         * Set the value of avatar_url
         *
         * @return  self
         */ 
        public function setAvatar_url($avatar_url)
        {
                $this->avatar_url = $avatar_url;

                return $this;
        }

        /**
         * Get the value of group
         */ 
        public function getGroup()
        {
                return $this->group;
        }

        /**
         * Set the value of group
         *
         * @return  self
         */ 
        public function setGroup($group)
        {
                $this->group = $group;

                return $this;
        }
    }
?>