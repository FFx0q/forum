<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Config;

    use App\Entity\Category;
    use App\Entity\Forum;
    
    class IndexController extends Controller
    {
        public function index() 
        {
            $category = $this->getManager()->getRepository(Forum::class)->findAll();

            foreach($category as $key)
            {
                $category = $this->getManager()->getRepository(Forum::class)->findBy(['id'=>$key]);
                $id = $category[0]->getCategory()->getId().'-'.$category[0]->getCategory()->getTitle();
                $data[$id][] = $category[0]->getId().'-'.$category[0]->getTitle();
            }
      
            return $this->render('index/index.twig',[
                'category' => isset($data) ? $data : " "
            ]);
        }
    }
