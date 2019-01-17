<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Route;
    use App\Base\Request;


    use App\Entity\Subcategory;
    use App\Entity\Topic;

    class CategoryController extends Controller
    {
        public function forum()
        {
            $request = new Request();
            $route = new Route($request);

            $id = explode('-', ltrim($route->getParam(), '-'));
            $data = $this->getManager()->getRepository(Subcategory::class)->findBy(['category' => $id[0]]);

            foreach ($data as $key => $value) 
            {
                $forum[] = $data[$key]->getId().'-'.$data[$key]->getTitle();
            }

            return $this->render("category/forum.twig", 
            [
                'forums' => $forum
            ]);
        }
        public function category()
        {
            $request = new Request();
            $route = new Route($request);

            $id = explode('-', ltrim($route->getParam(), '-'));
            $data = $this->getManager()->getRepository(Topic::class)->findBy(['subcategory'=> $id[0]]);

            foreach ($data as $key => $value) 
            {
                $topic[] = $data[$key]->getId().'-'.$data[$key]->getTitle();
            }

            return $this->render("category/category.twig", 
            [
                'topics' => $topic
            ]);

        }
    }