<?php
    namespace App\Controller;

    use App\Base\Controller;

    use App\Base\Route;

    use App\Entity\Topic;
    use App\Entity\Post;



    class PostController extends Controller 
    {
        public function create($uid, $tid, $content, $date)
        {
            $em = $this->getManager();
            
            $user = $em->find('App\Entity\User', $uid);
            $topic = $em->find('App\Entity\Topic', $tid);

            $post = new Post();
            
            $post->setAuthor($user)
                 ->setTopic($topic)
                 ->setPost($content)
                 ->setPostDate($date);

            $em->persist($post);
            $em->flush();
            
            Route::redirect('topic/show/'.$tid.'-topic');
        }
    }