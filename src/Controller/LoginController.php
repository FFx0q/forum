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
            var_dump($_SESSION);
            if (Login::isUserLoggedIn()) {
                Router::redirect('/home/index');
            } else {
                return View::render('login/login.twig');
            }
        }

        public function LoginAction() 
        {

            if (isset($_POST['username']) AND isset($_POST['password'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

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