<?php 
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     */
    class Groups
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer", name="id")
         * @ORM\GeneratedValue
         */
        private $id;   
        
        /**
         * @ORM\Column(type="string")
         */
        private $groupName;
    }