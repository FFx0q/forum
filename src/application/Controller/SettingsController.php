<?php
    namespace App\Controller;

    use App\Base\Http;
    use App\Base\Controller;
    use App\Base\Session;
    use App\Base\Router;
    use App\Models\User;
    use App\Models\Settings;

    class SettingsController extends Controller 
    {
        public function index()
        {
            if (!Session::get('user_logged_in'))
                Router::redirect('/home');

            $user = new User($this->db);
            $data = $user->find(Session::get('user_id'));

            return $this->render('settings/settings.twig', [
                'data' => $data
            ]);
        }

        public function save() : void
        {
            $settings = new Settings($this->db);        
            Session::remove('errors');
    
            if (!Http::isPost())
                return;

            $email = $this->validate($_POST['email']);
            $password = $this->validate($_POST['password']);
            $username = $this->validate($_POST['display_name']);

            $success = $settings->save($username, $password, $email);
            if ($success) {
                Router::redirect('/home');
            } else {
                Router::redirect('/settings');
            }
        }       
    }