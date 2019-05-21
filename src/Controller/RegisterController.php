<?php 
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Router;
    use App\Base\View;
    use App\Models\Register;


    class RegisterController extends Controller
    {
        public function IndexAction()
        {
            return View::render('/register/register.twig');
        }

        public function RegisterAction()
        {
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
            {
                $username = htmlspecialchars($_POST['username']);
                $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
                $email = htmlspecialchars($_POST['email']);
                $date = new \DateTime();

                $success = Register::register($username, $password, $email, $date->getTimestamp());
                
                if ($success) {
                    Router::redirect('/login/index');
                } else {
                    Router::redirect('/register/index');
                }
            }
        }

    }