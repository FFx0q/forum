<?php
    namespace App\Controller;

    use App\Base\Controller;
    use App\Base\Route;

    use App\Entity\Topic;
    
    class TopicController extends Controller 
    {
        public function show()
        {
            return $this->render('topic/post.twig');
        }
    }