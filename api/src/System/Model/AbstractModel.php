<?php
    namespace System\Model;

    use PDO;
    use System\Database\Database;

    abstract class AbstractModel
    {
        protected $table;
        private $db;

        public function __construct(Database $db)
        {
            $this->db = $db;

            $parts = explode('\\', static::class);
            $this->table = strtolower(end($parts));
            
        }

        public function getDatabase() : PDO
        {
            return $this->db->getConnection();
        }

        public function find($id)
        {
            $stmt = $this->getDatabase()->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $stmt->execute(['id' => $id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public function findAll()
        {
            $stmt = $this->getDatabase()->query("SELECT * FROM {$this->table}");

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
