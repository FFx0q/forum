<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Route;
    use App\Entity\Question;
    use App\Entity\Post;

    class PostController extends Controller 
    {
        public function create($uid, $tid, $content, $date)
        {
            $em = $this->getManager();
            
            $user = $em->find('App\Entity\User', $uid);
            $topic = $em->find('App\Entity\Question', $tid);

            $post = new Post();
            
            $post->setAuthor($user)
                 ->setQuestion($topic)
                 ->setPost($content)
                 ->setPostDate($date)
                 ->setVotes(3);

            $em->persist($post);
            $em->flush();
            
            Route::redirect('/question/show/'.$tid);
        }
    }