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
            $user = new User($this->db);
            $users = $user->findAll();

            return $this->render('user/list.twig', [
                'users' => $users
            ]);
        }

        public function profile($id)
        {
            $user = new User($this->db);
            $profile = $user->find($id);

            if (!isset($profile))
                Router::redirect('/home');
                
            return $this->render('user/profile.twig',
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
