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
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $date = new \DateTime();
            
            $success = Register::register($username, $password, $email, $date->getTimestamp());

            if ($success) {
                Router::redirect('/login/index');
            } else {
                Router::redirect('/register/index');
            }
        }

    }