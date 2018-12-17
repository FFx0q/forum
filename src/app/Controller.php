<?php
    namespace App\Base;

    use Twig_Loader_Filesystem;
    use Twig_Environment;
    use App\Core;
    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;

    class Controller extends Core
    {
        private $database = [ 
            'driver' => 'pdo_mysql', 
            'host' => 'localhost', 
            'dbname' => 'testowa', 
            'user' => 'root', 
            'password' => 'bP75meku' 
        ]; 

        public function render($template, $param = [])
        {
            $loader = new Twig_Loader_Filesystem($this->getTemplateDir());
            $twig = new Twig_Environment($loader, [
                'cache' => $this->getCacheDir(),
                'auto_reload' => true
            ]);

            return $twig->render($template, $param);
        }

        public function config()
        {
            return Setup::createAnnotationMetadataConfiguration(["./src/Entity"], true, null, null, true);    
        }

        public function getManager()
        {
            return EntityManager::create($this->conn, $this->config());
        }
    }