<?php
    namespace App\Base;

    use Twig_Loader_Filesystem;
    use Twig_Environment;
    use App\Core;
    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;

    class Controller extends Core
    {
        public function render($template, $param = [])
        {
            $loader = new Twig_Loader_Filesystem($this->getTemplateDir());
            $twig = new Twig_Environment($loader, [
                'cache' => $this->getCacheDir(),
                'auto_reload' => true
            ]);

            return $twig->render($template, $param);
        }

        public function getManager()
        {
            $config = Setup::createAnnotationMetadataConfiguration(["./src/Entity"], true); 
            
            $conn = array(
                'driver'   => 'pdo_mysql',
                'user'     => 'root',
                'password' => 'bP75meku',
                'dbname'   => 'testowa',
            );

            return EntityManager::create($conn, $config);
        }
    }