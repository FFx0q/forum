<?php
    namespace App\Models;

    use App\Base\Model;
    use App\Base\Session;
    use App\Models\User;
    use PDO;
    
    class Login extends Model
    {
        public static function login($username, $password)
        {
            $user = new User();
            $data = self::validateUser($username, $password);
            
            if (!$data) {
                return false;
            }
            
            self::setLoginIntoSession($data['id'], $data['group_id'],
                $username, $data['avatar_url']);

            return true;
        }

        public static function validateUser($username, $password)
        {
            $user = new User();
            $data = $user->findOneBy(['name' => $username]);

            if (!$data) {
                Session::add('errors', "Wrong username or password");
                return false;
            }

            if (!password_verify($password, $data['member_password_hash'])) {
                Session::add('errors', 'Wrong username or password');
                return false;
            }

            return $data;
        }

        public static function setLoginIntoSession($id, $group_id, 
            $username, $avatar)
        {
            Session::init();
            session_regenerate_id(true);
            $_SESSION = [];

            Session::set('user_id', $id);
            Session::set('user_name', $username);
            Session::set('user_avatar', $avatar);
            Session::set('user_group', $group_id);
            Session::set('user_logged_in', true);
            Session::remove('errors');
        }
        public static function logout() 
        {
            Session::destroy();
        }
        public static function isUserLoggedIn()
        {
            return (Session::get('user_logged_in') ? true : false);
        }
    }