<?php
    namespace App\Models;

    use App\Base\Model;
    use PDO;

    class User extends Model
    {
        public function getAllUsers()
        {
            $db = static::getInstance();

            $stmt = $db->prepare('
                SELECT id, name
                FROM User
            ');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUserById($id)
        {
            $db = static::getInstance();

            $stmt = $db->prepare('
                SELECT id, name
                FROM User
                WHERE id = :id
            ');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }