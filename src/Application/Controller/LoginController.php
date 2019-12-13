<?php
    namespace App\Controller;

    use App\Base\Http;
    use App\Base\Controller;
    use App\Base\Router;
    use App\Models\Login;
    use App\Base\Session;

    class LoginController extends Controller
    {
        public function index()
        {
            if (Login::isUserLoggedIn()) {
                Router::redirect('/home');
            } else {
                return $this->render('login/login.twig');
            }
        }

        public function login()
        {
            Session::remove('errors');
            if (!Http::isPost()) {
                return;
            }
                
            $username = $this->validate($_POST['username']);
            $password = $this->validate($_POST['password']);

            $success = Login::login($username, $password);
                
            if ($success) {
                Router::redirect('/home');
            } else {
                Router::redirect('/login');
            }
        }

        public function logout()
        {
            Login::logout();
            Router::redirect('/home');
        }
    }
