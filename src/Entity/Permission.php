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
         * @ORM\Column(type="smallint", name="id")
         * @ORM\GeneratedValue
         */
        private $id;

        /**
         * @ORM\ManyToOne(targetEntity="Groups")
         */
        private $group;

        /**
         * @ORM\Column(type="boolean")
         */
        private $edit;

        /**
         * @ORM\Column(type="boolean")
         */
        private $show;

        /**
         * @ORM\Column(type="boolean")
         */
        private $delete;
    }
