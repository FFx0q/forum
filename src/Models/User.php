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
                SELECT *
                FROM User
            ');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUserById($id)
        {
            $db = static::getInstance();

            $stmt = $db->prepare('
                SELECT *
                FROM User
                WHERE id = :id
            ');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOneUserBy($field, $value)
        {
            $db = static::getInstance();
            $sql = "SELECT * FROM User WHERE $field = :value";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':value', $value);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function createNewUser(
            $group_id, 
            $username, 
            $password, 
            $email, 
            $created, 
            $avatar,
            $reputation
        )
        {
            $db = static::getInstance();

            $sql = "INSERT INTO User (group_id, `name`, member_password_hash, email, join_date, avatar_url, reputation) VALUES(?, ?, ?, ?, ?, ?, ?)";
            return $db->prepare($sql)->execute([$group_id, $username, $password, $email, $created, $avatar, $reputation]);
        }
    }