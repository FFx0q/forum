<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Config;
    
    class IndexController extends Controller
    {
        public function index() 
        {
            $builder = $this->getManager()->createQueryBuilder();

            $data = $builder
            ->select('q.id qid, q.title title, q.topic_date topic_date,
                    u.id uid, u.name username, u.reputation reputation, 
                    p.votes vote')
            ->addSelect('(SELECT count(a.id) 
                    FROM App\Entity\Post a 
                    WHERE q.id =  a.question) as answers
            ')
            ->from('App\Entity\Question','q')
            ->join('App\Entity\User', 'u')
            ->join('App\Entity\Post', 'p')
            ->groupBy('q.title')
            ->where('p.question = q.id')
            ->getQuery()
            ->execute();
                
            return $this->render('index/index.twig',[
                'questions' => isset($data) ? $data : " "
            ]);
        }
    }
