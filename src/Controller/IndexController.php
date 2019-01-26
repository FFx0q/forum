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
            $builder = $this->getManager()->createQueryBuilder();

            $data = $builder
            ->select('c.id cid, c.title ctitle, f.id fid, f.title ftitle')
            ->addSelect('(SELECT count(p.id) 
                FROM App\Entity\Post p
                WHERE p.topic = t.id) as posts
            ')
            ->from('App\Entity\Category','c')
            ->join('App\Entity\Forum', 'f')
            ->join('App\Entity\Topic', 't')
            ->where('c.id = f.category')
            ->andWhere('t.forum = f.id')
            ->getQuery()
            ->execute();
            
            foreach($data as $key)
                $category[$key['cid'].'-'.$key['ctitle']][] = [$key['fid'], $key['ftitle'], $key['posts']];
            
            return $this->render('index/index.twig',[
                'category' => isset($category) ? $category : " "
            ]);
        }
    }
