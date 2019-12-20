<?php
    namespace Application\Model;
    
    use System\Model\AbstractModel;

    class Thread extends AbstractModel
    {
        public function userThreads(int $id)
        {
            $sql = "SELECT * FROM {$this->table} where author_id = :id";
            $stmt = $this->getDatabase()->prepare($sql);

            $stmt->execute([":id" => $id]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }