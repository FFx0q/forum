<?php
    namespace App\Base;

    use Twig_Loader_Filesystem;
    use Twig_Environment;
    use App\Core;
    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;
    use DI\ContainerBuilder;
    use App\Base\Config;
    require_once('config/app.php');

    class Controller extends Core
    {
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
            return EntityManager::create([
                'driver' => Config::get('database/driver'),
                'host' =>Config::get('database/dbhost'),
                'dbname' => Config::get('database/dbname'),
                'user' => Config::get('database/dbuser'),
                'password'=> Config::get('database/dbpass'),
            ], $this->config());
        }  

        public function containerBuild()
        {
            $container = new ContainerBuilder();
            $container->addDefinitions($this->getConfigDir().'/config.php');
            return $container->build();
        }
    }