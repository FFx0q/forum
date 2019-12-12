<?php
    namespace System\Model;

    use PDO;

    abstract class AbstractModel
    {
        protected $table;
        private $db;

        public function __construct(PDO $db)
        {
            $this->db = $db;        
        }

        public function getDatabase() : PDO
        {
            return $this->db;
        }

        public function find($id)
        {
            $stmt = $this->getDatabase()->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $stmt->execute(['id' => $id]);

            return $stmt->fetch();
        }
        
        public function findAll()
        {
            $stmt = $this->getDatabase()->query("SELECT * FROM {$this->table}");

            return $stmt->fetchAll();
        }
    }