<?php
    namespace App\Base;

    use Twig_Loader_Filesystem;
    use Twig_Environment;
    use App\Core;
    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;
    use DI\ContainerBuilder;

    class Controller extends Core
    {
        private $database = [ 
            'driver' => 'pdo_mysql', 
            'host' => 'localhost', 
            'dbname' => 'testowa', 
            'user' => 'root', 
            'password' => 'bP75meku' 
        ]; 
        public function loader()
        {
            return new Twig_Loader_Filesystem($this->getTemplateDir());
        }

        public function environment()
        {
            return new Twig_Environment($this->loader(), [
                'cache' => $this->getCacheDir(),
                'auto_reload' => true
            ]);
        }
        public function render($template, $param = [])
        {
            $this->loader();
            $twig = $this->environment();
            $twig->addGlobal('session', $_SESSION);
            return $twig->render($template, $param);
        }

        public function config()
        {
            return Setup::createAnnotationMetadataConfiguration(["./src/Entity"], true, null, null, false);    
        }

        public function getManager()
        {
            return EntityManager::create($this->database, $this->config());
        }  

        public function containerBuild()
        {
            $container = new ContainerBuilder();
            $container->addDefinitions($this->getConfigDir().'/config.php');
            return $container->build();
        }
    }