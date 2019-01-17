<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Route;
    use App\Base\Request;
    use App\Entity\Topic;
    use App\Entity\Post;
    
    class TopicController extends Controller 
    {
        public function show()
        {
            $request = new Request();
            $route = new Route($request);

            $id = explode('-', ltrim($route->getParam(), '-'));
            $data = $this->getManager()->getRepository(Post::class)->findBy(['topic' => $id[0]]);
            for($i = 0; $i < count($data); $i++)
            {
                $posts[] = $data[$i]->getPost();
            }
            return $this->render('topic/post.twig', 
        [
            'posts' => $posts
        ]);
        }
    }