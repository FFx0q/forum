<?php
    namespace Application\Controller;

    use Application\Model\Thread;
    use Application\Model\Post;
    
    use System\Controller\AbstractController;
    use System\Http\Response;

    class ThreadController extends AbstractController
    {
        public function getTheards()
        {
            $model = new Thread();
            $result = $model->findAll();

            return new Response(200, json_encode($result));
        }

        public function getThread(int $id)
        {
            $model = new Thread();
            $result = $model->find($id);

            return new Response(200, json_encode($result));
        }

        public function getThreadPosts(int $id)
        {
            $model = new Post();
            $result = $model->getThreadPosts($id);

            return new Response(200, json_encode($result));
        }
    }
