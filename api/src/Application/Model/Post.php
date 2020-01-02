<?php
    namespace Application\Model;

    use System\Model\AbstractModel;

    class Post extends AbstractModel
    {
        public function threadPosts(int $id)
        {
            $sql = "SELECT * FROM {$this->table} WHERE thread_id = :id";
            
            $stmt = $this->getDatabase()->prepare($sql);
            $stmt->execute(['id' => $id]);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function userPosts(int $id)
        {
            $sql = "SELECT * FROM {$this->table} WHERE author_id = :id";
            
            $stmt = $this->getDatabase()->prepare($sql);
            $stmt->execute(['id' => $id]);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
