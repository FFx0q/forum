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

            if(empty($user))
                Router::redirect('/home/index');
                
            return View::render('user/profile.twig',
            [
                'user' => $user
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
    }
