<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Entity\User;
    use App\Base\Route;
    
    class UserController extends Controller
    {
        public function user() 
        {
            $users = $this->getManager()->createQuery("SELECT u.name, u.pid FROM App\Entity\User AS u")->getResult();
            return $this->render('user/user.twig', 
            [
                'users'=>$users
            ]);
        }

        public function create($username, $password, $email, $created)
        {
            $em = $this->getManager();
            $user = new User();
			$user->setName($username);
			$user->setPassword($password);
			$user->setEmail($email);
			$user->setJoinDate($created);
			$em->persist($user);
			$em->flush();

			Route::redirect('index/index');
        }

        public function usernameExists($username)
        {
            $query = $this->getManager()->createQuery("SELECT u.name FROM App\Entity\User as u WHERE u.name = :uname");
            $query->setParameters([
				'uname'     => $username
            ]);
            @$user = $query->getResult()[0];

            if(!empty($user))
            {
                Route::redirect('user/register');
                return true;
            }
            return false;
        }

        public function userExists($username, $password)
        {
    
            $query = $this->getManager()->createQuery('SELECT u.name, u.password FROM App\Entity\User as u WHERE u.name=:username');
            $query->setParameters([
                'username'     => $username
            ]);

            $user = $query->getResult();
            $hash = $user[0];

            if(password_verify($password, $hash['password']))
                return true;
            else 
                return false;
        }

        public function logged($username)
        {
            $_SESSION['login'] = $username;
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
        public function profile()
        {
            return $this->render('user/profile.twig');
        }
    }
