<?php
    namespace App\Models;

    use App\Base\Model;
    use PDO;

    class User extends Model
    {
        public function saveUser($username, $password, $email, $created)
        {
            $sql = "INSERT INTO User (group_id, `name`, member_password_hash, email, join_date, avatar_url, reputation, warnings) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            
            return $this->getDb()->prepare($sql)->execute([2, $username, $password, $email, $created, 'avatar_default.png', 0, 0]);
        }

        public function setUsername($id, $username)
        {
            $sql = "UPDATE User SET name = ? WHERE id = ?";
            
            return $this->getDb()->prepare($sql)->execute([$username, $id]);
        }

        public function setEmail($id, $email)
        {
            $sql = "UPDATE User SET email = ? WHERE id = ?";

            return $this->getDb()->prepare($sql)->execute([$email, $id]);
        }

        public function setPassword($id, $password)
        {
            $sql = "UPDATE User SET member_password_hash = ? WHERE id = ?";

            return $this->getDb()->prepare($sql)->execute([$password, $id]);
        }


    }