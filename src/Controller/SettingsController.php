<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\View;
    use App\Models\User;

    class SettingsController extends Controller 
    {
        public function IndexAction()
        {
            $id = isset($_SESSION['login']) ? $_SESSION['login'] : 0;
            $data = User::getUserById($id);

            return View::render('settings/settings.twig',
            [
                'data' => isset($data) ? $data : 0
            ]);
        }
    }