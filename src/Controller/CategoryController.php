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
            $param = new Route();
            $request = new Request();
            $id = explode('-', ltrim($param->getParam($request->getUrl()), '-'));
            $data = $this->getManager()->getRepository(Subcategory::class)->findBy(['category' => $id[0]]);

            for($i = 0; $i < count($data); $i++)
            {
                $categories[] = $data[$i]->getId().'-'.$data[$i]->getTitle();
            }
            return $this->render("category/forum.twig", 
            [
                'categories' => $categories
            ]);
        }
        public function category()
        {
            $param = new Route();
            $request = new Request();
            $id = explode('-', ltrim($param->getParam($request->getUrl()), '-'));
            $data = $this->getManager()->getRepository(Topic::class)->findBy(['subcategory'=> $id[0]]);
            for($i = 0; $i < count($data); $i++)
            {
                $topic[] = $data[$i]->getId().'-'.$data[$i]->getTitle();
            }
            return $this->render("category/category.twig", 
            [
                'topics' => $topic
            ]);

        }
    }