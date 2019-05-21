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
            $data = $user->findOneBy('User', ['name' => $username]);
            
            if ($data) {
                if (password_verify($password, $data['member_password_hash'])) {
                    self::setLoginIntoSession($data['id'], $username, $data['avatar_url']);
                } else {
                    return false;
                }
            } else {
                return false;
            }
            return true;
        }

        public static function setLoginIntoSession($id, $username, $avatar)
        {
            Session::init();
            session_regenerate_id(true);
            $_SESSION = [];

            Session::set('user_id', $id);
            Session::set('user_name', $username);
            Session::set('user_avatar', $avatar);
            Session::set('user_logged_in', true);
        }
        public static function logout() 
        {
            session_destroy();
        }
        public static function isUserLoggedIn()
        {
            return (Session::get('user_logged_in') ? true : false);
        }
    }