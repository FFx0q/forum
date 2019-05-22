<?php
    namespace App\Models;

    use App\Base\Model;
    use PDO;

    class User extends Model
    {
        public function saveUser($username, $password, $email, $created)
        {
            $sql = "INSERT INTO User (group_id, `name`, member_password_hash, email, join_date, avatar_url, reputation, warnings) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            
            return $this->getDb()->prepare($sql)->execute([2, $username, $password, $email, $created, 'default.jpg', 0, 0]);
        }
    }