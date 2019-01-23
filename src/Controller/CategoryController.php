<?php
    namespace App\Controller;

    use App\Base\Controller;

    use App\Entity\Forum;
    use App\Entity\Topic;

    class CategoryController extends Controller
    {
        public function forum()
        {
            $route = $this->containerBuild()->get('App\Base\Route');

            $id = explode('-', ltrim($route->getParam(), '-'));
            $data = $this->getManager()->getRepository(Forum::class)->findBy(['category' => $id[0]]);

            foreach ($data as $key => $value) 
                $forums[] = $data[$key]->getId().'-'.$data[$key]->getTitle();
    
            return $this->render("category/forum.twig", 
            [
                'forums' => isset($forums) ? $forums : " "
            ]);
        }
        public function category()
        {
            $route = $this->containerBuild()->get('App\Base\Route');
    
            $id = explode('-', ltrim($route->getParam(), '-'));
            $data = $this->getManager()->getRepository(Topic::class)->findBy(['forum'=> $id[0]]);

            foreach ($data as $key => $value) 
                $topics[] = $data[$key]->getId().'-'.$data[$key]->getTitle();

            return $this->render("category/category.twig", 
            [
                'topics' => isset($topics) ? $topics : " "
            ]);

        }
    }