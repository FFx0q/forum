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
            $builder = $this->getManager()->createQueryBuilder();
            
            $id = explode('-', ltrim($route->getParam(), '-'))[0];
       
            $data = $builder 
                ->select('f.id, f.title')
                ->addSelect('(SELECT count(p.id)
                    FROM \App\Entity\Post p
                    JOIN \App\Entity\Topic t
                    WHERE p.topic = t.id AND t.forum = f.id) as posts
                ')
                ->from('\App\Entity\Forum', 'f')
                ->where('f.category = ?1')
                ->setParameter(1, $id)
                ->getQuery()
                ->execute();

            return $this->render("category/forum.twig", 
            [
                'forums' => isset($data) ? $data : " "
            ]);
        }
        public function category()
        {
            $route = $this->containerBuild()->get('App\Base\Route');
    
            $id = explode('-', ltrim($route->getParam(), '-'))[0];
            $data = $this->getManager()->getRepository(Topic::class)->findBy(['forum'=> $id[0]]);
            $builder = $this->getManager()->createQueryBuilder();

            $topics = $builder
                ->select('t.id, t.title')
                ->addSelect('(SELECT count(p.id) 
                    FROM App\Entity\Post p
                    WHERE p.topic = t.id) as replies
                ')
                ->from('App\Entity\Topic', 't')
                ->join('App\Entity\Forum', 'f')
                ->where('f.id = t.forum')
                ->andWhere('t.forum = ?1')
                ->groupBy('t.title')
                ->setParameter(1, $id)
                ->getQuery()
                ->execute();
                
                foreach($topics as $key)
                {
                    if($key['replies'] == 0)
                    {
                        $builder
                            ->delete("App\Entity\Topic", 't')
                            ->where('t.id = ?1')
                            ->setParameter(1, $key['id'])
                            ->getQuery()
                            ->execute();
                    }
                }

            return $this->render("category/category.twig", 
            [
                'topics' => isset($topics) ? $topics : " "
            ]);

        }
    }