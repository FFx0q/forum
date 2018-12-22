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
