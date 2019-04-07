<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Base\Router;
    use App\Models\User;

    class SettingsController extends Controller 
    {
        public function IndexAction()
        {
            if(empty($_SESSION['login']))
                Router::redirect('/user/login');
            
            $id = $_SESSION['login'];
            $data = User::getUserById($id);
            
            return View::render('settings/settings.twig',
            [
                'data' => isset($data) ? $data : 0
            ]);
        }
    }