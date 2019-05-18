<?php
    namespace App\Models;

    use App\Base\Model;
    use App\Models\User;

    class Register extends Model
    {
        public static function register($username, $password, $email, $date)
        {
            $data = User::getOneUserBy('name', $username);

            if (empty($data)) {
                User::createNewUser(2, $username, $password, $email, $date, "default.jpg", 0);
            } else {
                return false;
            }

            return true;
        }
    }