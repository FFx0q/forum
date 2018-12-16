<?php
    namespace App\Controller;

    use App\Base\Controller;
    
    class UserController extends Controller
    {
        public function user() 
        {
            return $this->render('user/user.twig');
        }
    }
