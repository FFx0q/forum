<?php
    namespace App\Base;

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

        private $twig = null;
        
        abstract public function index();

        public function __construct()
        {
            $this->core = new Core();
            $this->acl = new Acl();
            $this->db = new Database();
        }
        
        public function validate(string $str) : string 
        {
            return trim(htmlspecialchars($str));
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