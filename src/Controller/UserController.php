<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Models\User;
    
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

        public function create(
            $username, 
            $password, 
            $email, 
            $created, 
            $default_group = 2, 
            $avatar = "avatar_default.png"
        )
        {
            $em = $this->getManager();

            $user = new User();
            $group = $em->find('App\Entity\Groups', $default_group);

			$user->setName($username);
			$user->setPassword($password);
			$user->setEmail($email);
            $user->setJoinDate($created);
            $user->setAvatar_url($avatar);
            $user->setGroup($group);
			$em->persist($user);
			$em->flush();

			Route::redirect('index/index');
        }

        public function usernameExists($username)
        {
            if($this->getManager()->getRepository('App\Entity\User')->findOneBy(['name' => $username]))
            {
                Route::redirect('user/register');
                return true;
            }
            return false;
        }

        public function userExists($username, $password)
        { 
            $user = $this->getManager()->getRepository('App\Entity\User')->findOneBy(['name' => $username]);

            if($user && password_verify($password, $user->getPassword()))
                return true;
            else 
                return false;
        }

        public function logged($username)
        {
            $id = $this->getManager()->getRepository(User::class)->findBy(['name'=> $username])[0]->getId();

            $_SESSION['login'] = $id.'-'.$username;

            Route::redirect('index/index');
        }

        public function register()
        {
            return $this->render('user/register.twig', [
                'link' => '/register.php'
            ]);
        }

        public function login()
        {
            return $this->render('user/login.twig', [
                'link' => '/login.php'
            ]);      
        }

        public function logout()
        {
            unset($_SESSION["login"]);
            Route::redirect("/index/index");
        }
    }
