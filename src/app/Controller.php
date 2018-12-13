<?php
    namespace App\Base;

    use Twig_Loader_Filesystem;
    use Twig_Environment;
    use App\Core;
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
    }