<?php 
    namespace App\Controller;

    use App\Base\Http;
    use App\Base\Controller;
    use App\Base\Router;
    use App\Base\View;
    use App\Base\Session;
    use App\Models\Register;


    class RegisterController extends Controller
    {
        public function index()
        {
            return $this->render('/register/register.twig');
        }

        public function register() : void
        {
            Session::remove('errors');

            if (!Http::isPost())
                return;
                
            $username = $this->validate($_POST['username']);
            $password = $this->validate($_POST['password']);
            $email = $this->validate($_POST['email']);
            $date = new \DateTime();

            $success = Register::register($username, $password, $email, $date->getTimestamp());

            if ($success) {
                Router::redirect('/login');
            } else {
                Router::redirect('/register');
            }
        }

    }