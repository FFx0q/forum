<?php
    namespace System;

    use PDO;
    use App\Core;
    use App\Base\Database;

    abstract class Model
    {
        protected $table;
        protected $db;

        public function __construct(Database $database)
        {
            $parts = explode('\\', static::class);
            $this->table = end($parts);
            $this->db = $database;
        }

        public function getDb()
        {
            return $this->db->getConnection();
        }

        /*
         * Return single record find by id
         */
        public function find(int $id)
        {
            $sql = "SELECT * FROM ". $this->table ." WHERE id = :id";
            $stmt = $this->getDb()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function findOneBy(array $params = [])
        {
            $where = [];

            foreach($params as $key => $value) {
                $where[] = $key . " = ? ";
            }
            
            $sql = sprintf("SELECT * FROM %s WHERE %s LIMIT 1", $this->table, implode('AND ', $where));
            
            $stmt = $this->getDb()->prepare($sql);
            $stmt->execute(array_values($params));
           
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        }

        public function findBy(array $params = [])
        {
            $where = [];

            foreach($params as $key => $value) {
                $where[] = $key . " = ? ";
            }
            
            $sql = sprintf("SELECT * FROM %s WHERE %s", $this->table, implode('AND ', $where));
            
            $stmt = $this->getDb()->prepare($sql);
            $stmt->execute(array_values($params));
           
            return $stmt->fetchAll(PDO::FETCH_ASSOC);          
        } 

        public function findAll()
        {
            $stmt = $this->getDb()->prepare("SELECT * FROM {$this->table}");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete(int $id)
        {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";

            return $this->db->prepare($sql)->execute([$id]);
        }
    }