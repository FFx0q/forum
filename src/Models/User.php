<?php
    namespace App\Models;

    use App\Base\Model;
    use PDO;

    class User extends Model
    {
        public function saveUser(
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