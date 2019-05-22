<?php 
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Base\Router;
    use App\Models\Login;
    use App\Base\Session;
    class LoginController extends Controller 
    {
        public function IndexAction()
        {   
            if (Login::isUserLoggedIn()) {
                Router::redirect('/home/index');
            } else {
                return View::render('login/login.twig');
            }
        }

        public function LoginAction() 
        {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $this->validate($_POST['username']);
                $password = $this->validate($_POST['password']);

                $success = Login::login($username, $password);

                if ($success) {
                    Router::redirect('/home/index');
                } else {
                    Router::redirect('/login/index');
                }
            }
        }

        public function LogoutAction()
        {
            Login::logout();
            Router::redirect('/home/index');
        }
    }