<?php
    namespace Application\Model;
    
    use System\Model\AbstractModel;

    class Thread extends AbstractModel
    {
        public function getTheardsCategory(int $id)
        {
            $sql = "SELECT * FROM {$this->table} WHERE category_id = :id";

            $stmt = $this->getDatabase()->prepare($sql);
            $stmt->execute(['id' => $id]);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }