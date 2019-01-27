<?php
    namespace App\Controller;

    use App\Base\Controller;

    use App\Entity\Topic;
    use App\Entity\Post;
    
    class TopicController extends Controller 
    {
        public function show()
        {
            $route = $this->containerBuild()->get('App\Base\Route');

            $id = explode('-', ltrim($route->getParam(), '-'))[0];
            $builder = $this->getManager()->createQueryBuilder();
            
            $posts = $builder
            ->select('p.id, p.post, p.post_date, u.name, IDENTITY(u.group) as group_id ,IDENTITY(p.topic) topic_id, t.title')
            ->addSelect('(SELECT count(a.author) 
                    FROM App\Entity\Post a 
                    WHERE a.author = p.author) as posts
            ')
            ->addSelect('(SELECT count(b.author)
                    FROM App\Entity\Topic b
                    WHERE b.author = p.author) as topics
            ')
            ->from('App\Entity\Post', 'p')
            ->join('App\Entity\User', 'u')
            ->join('App\Entity\Topic', 't')
            ->where('u.id = p.author')
            ->andWhere('p.topic = t.id')
            ->andWhere("p.topic = ?1")
            ->orderBy('p.id', 'ASC')
            ->setParameter(1, $id)
            ->getQuery()
            ->execute();
      
            $permission = $this->getManager()->createQueryBuilder()
                ->select('p.edit')
                ->from('App\Entity\Permission', 'p')
                ->join('App\Entity\Groups', 'g')
                ->join('App\Entity\User', 'u')
                ->where('p.group = g.id')
                ->andWhere('u.group = g.id')
                ->andWhere('u.id = ?1')
                ->setParameter(1, explode('-',$_SESSION['login'])[0])
                ->getQuery()
                ->execute();
                
            return $this->render('topic/post.twig', 
            [
                'posts' => isset($posts) ? $posts : " ",
                'permission' => isset($permission) ? $permission[0] : " "
            ]);
        }
    }