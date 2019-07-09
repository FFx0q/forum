<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Models\User;
    use App\Base\Router;
    
    class UserController extends Controller
    {
        public function index() {}
            
        public function list() 
        {
            $user = new User();
            $users = $user->findAll();

            return View::render('user/list.twig', 
            [
                'users' => isset($users) ? $users : 0
            ]);
        }

        public function profile($id)
        {
            $user = new User();
            $profile = $user->find($id);

            if (empty($profile))
                Router::redirect('/home');
                
            return View::render('user/profile.twig',
            [
                'user' => $profile
            ]);
        }

        public function create(
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
