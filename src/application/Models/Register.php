<?php
    namespace App\Models;

    use App\Base\Model;
    use App\Models\User;
    use App\Base\Session;
    use App\Base\Database;

    class Register extends Model
    {
        public static function register($username, $password, $email, $date)
        {
            $db = new Database();
            $user = new User($db);

            $validation = self::registerValidation($username, $password, $email);
            $data = $user->findOneBy(['name'=>$username]);

            if (!$validation) {
                return false;
            }

            if (!empty($data)) {
                Session::add('errors', 'Username or email already taken');
                return false;
            }
            $user->saveUser($username, password_hash($password, PASSWORD_DEFAULT), $email, $date);
            Session::remove('errors');
            
            return true;
        }

        public static function registerValidation($username, $password, $email)
        {
            if (empty($username)) {
                Session::add('errors', 'Username field empty');
                return false;
            } else {
                if (!preg_match('/^[a-zA-Z0-9\s]+$/', $username)) {
                    Session::add('errors', "Name can only contain letters, numbers and white spaces");
                    return false;
                }
            }

            if (empty($password)) {
                Session::add('errors', 'Password field empty');
                return false;
            } else {
                if (strlen($password) < 6 ) {
                    Session::add('errors', 'Please enter a long password');
                    return false;
                }
            }

            if (empty($email)) {
                Session::add('errors', 'Email field empty');
                return false;
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    Session::add('errors', 'Invalid Email');
                    return false;
                }
            }

            return true;
        }
    }