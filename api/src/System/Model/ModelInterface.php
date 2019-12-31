<?php
    namespace System\Model;
    use PDO;
    interface ModelInterface
    {
        public function getDatabase() : PDO;
        public function find(int $id);
        public function findAll();
    }