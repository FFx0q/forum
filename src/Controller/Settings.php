<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Entity\User;
    use App\Base\Route;

    class SettingsController extends Controller 
    {
        public function overview()
        {
            $id = explode("-", $_SESSION['login'])[0];

            $email = $this->getManager()->getRepository(User::class)->find($id)->getEmail();

            return $this->render('settings/overview.twig',
            [
                'email' => $email
            ]);
        }

        public function email()
        {
            $id = explode("-", $_SESSION['login'])[0];
            return $this->render('settings/email.twig',
            [
                'id' => $id
            ]);           
        }

        public function password()
        {
            $id = explode("-", $_SESSION['login'])[0];
            return $this->render('settings/password.twig',
            [
                'id' => $id
            ]);           
        }
    }