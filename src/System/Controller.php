<?php
    namespace System;

    use App\Base\Router;
    use App\Base\Request;
    use App\Base\Acl;
    use App\Base\Database;
    use App\Core;

    abstract class Controller
    {
        protected $acl;
        protected $db;
        protected $core;
        protected $method;

        private $twig = null;
        
        abstract public function index();

        public function __construct(string $method)
        {
            $this->core = new Core();
            $this->acl = new Acl();
            $this->db = new Database();
            $this->method = $method;
        }
        
        public function validate(string $str) : string 
        {
            return trim(htmlspecialchars($str));
        }

        public function getMetohd() : string
        {
            return $this->method;
        }

        public function render(string $template, array $args = [])
        {
            if ($this->twig === null) {
                $loader = new \Twig_Loader_Filesystem($this->core->getTemplateDir());
                $this->twig = new \Twig_Environment($loader, [
                    'cache' => $this->core->getCacheDir(),
                    'auto_reload' => true
                ]);
            }
            $this->twig->addGlobal('session', $_SESSION);
            
            echo $this->twig->render($template, $args);
        }
    }