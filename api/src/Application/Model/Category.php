<?php
    namespace Application\Model;

    use System\Model\AbstractModel;

    class Category extends AbstractModel
    {
        public function getCategory(int $id)
        {
            return $this->find($id);
        }
        public function getAllCategories()
        {
            $sql = "SELECT * FROM {$this->table} WHERE root_category IS NULL";
            $stmt = $this->getDatabase()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        public function getSubCategories(int $id)
        {
            $sql = "SELECT * FROM {$this->table} WHERE root_category=:id";

            $stmt = $this->getDatabase()->prepare($sql);
            $stmt->execute(['id' => $id]);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        }
    }
