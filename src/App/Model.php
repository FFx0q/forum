<?php
    namespace App\Base;

    use PDO;
    use App\Core;

    class Model
    {
        protected $db;

        protected function getDb() 
        {
            if ($this->db == null) {
                $pdo = 'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_DATABASE').';charset=utf8';
                $this->db = new PDO($pdo, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $this->db;        
        }

        /*
         * Return single record find by id
         */

        public function find($table, $id)
        {
            $sql = "SELECT * FROM {$table} WHERE id = :id";
            $stmt = $this->getDb()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function findOneBy($table, $params = [])
        {
            $where = [];

            foreach($params as $key => $value) {
                $where[] = $key . " = ? ";
            }
            
            $sql = sprintf("SELECT * FROM %s WHERE %s LIMIT 1", $table, implode('AND ', $where));
            
            $stmt = $this->getDb()->prepare($sql);
            $stmt->execute(array_values($params));
           
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        }

        public function findBy($table, $params = [])
        {
            $where = [];

            foreach($params as $key => $value) {
                $where[] = $key . " = ? ";
            }
            
            $sql = sprintf("SELECT * FROM %s WHERE %s", $table, implode('AND ', $where));
            
            $stmt = $this->getDb()->prepare($sql);
            $stmt->execute(array_values($params));
           
            return $stmt->fetchAll(PDO::FETCH_ASSOC);          
        } 

        public function findAll($table)
        {
            $stmt = $this->getDb()->prepare("SELECT * FROM {$table}");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete($table, $id)
        {
            $sql = "DELETE FROM {$table} WHERE id = ?";

            return $this->db->prepare($sql)->execute([$id]);
        }
    }