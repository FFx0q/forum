<?php
    namespace App\Models;

    use App\Base\Model;
    use App\Base\Session;
    use App\Models\User;

    class Settings extends Model
    {
        public function save($username, $password, $email)
        {
            $id = Session::get('user_id');
            $user = new User();
            $validation = self::validation($username, $password, $email);
            
            if(!$validation)
                return false;

            $user->setUsername($id, $username);
            $user->setEmail($id, $email);
            $user->setPassword($id, password_hash($password, PASSWORD_DEFAULT));

            return true;
            
        }

        public static function validation($username, $password, $email)
        {
            if (!preg_match('/^[a-zA-Z0-9\s]+$/', $username)) {
                Session::add('errors', "Name can only contain letters, numbers and white spaces");
                return false;
            }

            if (strlen($password) < 6 ) {
                Session::add('errors', 'Please enter a long password');
                return false;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Session::add('errors', 'Invalid Email');
                return false;
            }
            
            return true;
        }
    }