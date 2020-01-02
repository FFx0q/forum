<?php
    namespace Application\Model;

    use PDOException;
    use System\Model\AbstractModel;

    class Category extends AbstractModel
    {
        public function getSubcategories(int $id)
        {
            try {
                $sql = "SELECT * FROM {$this->table} WHERE root_category=:id";

                $stmt = $this->getDatabase()->prepare($sql);
                $stmt->execute(['id' => $id]);

                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
