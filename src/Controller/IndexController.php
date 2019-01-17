<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Entity\Category;
    use App\Entity\Forum;
    
    class IndexController extends Controller
    {
        public function index() 
        {
            $count = $this->getManager()->createQuery("SELECT count(c.id) FROM App\Entity\Forum c")->getResult()[0];
            for($i = 1; $i <= $count[1]; $i++)
            {
                $category[] = $this->getManager()->getRepository(Forum::class)->findBy(['id'=>$i]);
            }
            for($i = 0; $i < $count[1]; $i++)
            {
                $id = $category[$i][0]->getCategory()->getId().'-'.$category[$i][0]->getCategory()->getTitle();
                $data[$id][] = $category[$i][0]->getId().'-'.$category[$i][0]->getTitle();
            }

            return $this->render('index/index.twig',[
                'data' => $data
            ]);
        }
    }
