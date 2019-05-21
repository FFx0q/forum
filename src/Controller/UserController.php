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
            $user = new User();
            $users = $user->findAll('User');

            return View::render('user/list.twig', 
            [
                'users' => isset($users) ? $users : 0
            ]);
        }

        public function ProfileAction()
        {
            $user = new User();

            $profile = $user->find('User', $this->getRouter()->getParam());

            if(empty($profile))
                Router::redirect('/home/index');
                
            return View::render('user/profile.twig',
            [
                'user' => $profile
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
            User::saveUser($group_id, $username, $password, $email, $created, $avatar, $reputation);
        }
    }
