<?php 
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Router;
    use App\Base\View;
    use App\Base\Session;
    use App\Models\Register;


    class RegisterController extends Controller
    {
        public function IndexAction()
        {
            return View::render('/register/register.twig');
        }

        public function RegisterAction()
        {
            Session::remove('errors');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $this->validate($_POST['username']);
                $password = $this->validate($_POST['password']);
                $email = $this->validate($_POST['email']);
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