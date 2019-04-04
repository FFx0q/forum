<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Models\User;
    use App\Base\Router;
    
    class UserController extends Controller
    {
        public function ListAction() 
        {
            $users = User::getAllUsers();
            
            return View::render('user/list.twig', 
            [
                'users' => isset($users) ? $users : 0
            ]);
        }

        public function ProfileAction()
        {
            $user = User::getUserById($this->getRouter()->getParam());

            return View::render('user/profile.twig',
            [
                'user' => isset($user) ? $user : 0
            ]);
        }

        public function LoginAction()
        {
            $user = User::getOneUserBy('name', 'maCotsu');
            return View::render('user/login.twig', [
                'link' => '/login.php'
            ]);      
        }

        public function RegisterAction()
        {
            return View::render('user/register.twig', [
                'link' => '/register.php'
            ]);
        }

        public function CreateAction(
            $group_id,
            $username, 
            $password, 
            $email, 
            $created,  
            $avatar = "avatar_default.png",
            $reputation = 0
        )
        {
            User::createNewUser($group_id, $username, $password, $email, $created, $avatar, $reputation);
        }

        public function usernameExists($username)
        {
            if(User::getOneUserBy('name', $username))
            {
                Router::redirect('user/register');
                return true;
            }
            return false;
        }

        public function userExists($username, $password)
        { 
            $user = User::getOneUserBy('name', $username);

            if($user && password_verify($password, $user[0]['member_password_hash']))
                return true;
            else 
                return false;
        }

        public function logged($username)
        {
            $id = User::getOneUserBy('name', $username)[0]['id'];
            $_SESSION['login'] = $id;

            Router::redirect('home/index');
        }

        public function logout()
        {
            unset($_SESSION["login"]);
            Router::redirect("home/index");
        }
    }
