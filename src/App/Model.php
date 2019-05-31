<?php
    namespace App\Base;

    use PDO;
    use App\Core;

    class Model
    {
        protected $db;
        private $table;

        public function __construct()
        {
            // remove namespace from string
            $temp = explode('\\', static::class);
            $this->table = end($temp);
        }

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

        public function find($id)
        {

            $sql = "SELECT * FROM {$this->table} WHERE id = :id";
            $stmt = $this->getDb()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function findOneBy($params = [])
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

        public function findBy($params = [])
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

        public function delete($id)
        {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";

            return $this->db->prepare($sql)->execute([$id]);
        }
    }