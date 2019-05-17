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
            $username = $_POST['loginName'];
            $password = $_POST['loginPass'];

            $success = Login::login($username, $password);

            if ($success) {
                Router::redirect('/home/index');
            } else {
                Router::redirect('/login/index');
            }
        }

        public function LogoutAction()
        {
            Login::logout();
            Router::redirect('/home/index');
        }
    }