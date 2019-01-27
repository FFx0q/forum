<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     */
    class Permission
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer", name="id")
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
        private $edit;

        /**
         * @ORM\Column(type="string")
         */
        private $show;

        /**
         * @ORM\Column(type="string")
         */
        private $delete;
    }
