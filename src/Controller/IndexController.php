<?php
    namespace App\Controller;

    use App\Base\Controller;
    
    class IndexController extends Controller
    {
        public function index() 
        {
            return $this->render('index/index.twig');
        }
    }
