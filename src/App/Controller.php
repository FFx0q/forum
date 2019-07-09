<?php
    namespace App\Base;

    use App\Base\Router;
    use App\Base\Request;

    abstract class Controller
    {

        abstract public function index();

        public function validate($str) : string 
        {
            return trim(htmlspecialchars($str));
        }
    }