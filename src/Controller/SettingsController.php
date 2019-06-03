<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Base\Session;
    use App\Base\Router;
    use App\Models\User;
    use App\Models\Settings;

    class SettingsController extends Controller 
    {
        public function IndexAction()
        {
            if(!Session::get('user_logged_in'))
                Router::redirect('/home/index');

            $user = new User();
            $data = $user->find(Session::get('user_id'));

            return View::render('settings/settings.twig', [
                'data' => $data
            ]);
        }

        public function SaveAction()
        {
            $id = Session::get('user_id');
            $settings = new Settings();
            
            Session::remove('errors');
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $this->validate($_POST['email']);
                $password = $this->validate($_POST['password']);
                $username = $this->validate($_POST['display_name']);

                $success = $settings->save($username, $password, $email);
                if ($success) {
                    Router::redirect('/home/index');
                } else {
                    Router::redirect('/settings/index');
                }
            }
            
        }
    }