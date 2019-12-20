<?php

use Post;

    namespace Application\Controller;

    use Application\Model\Thread;
    use Application\Model\Post;
    use System\Controller\AbstractController;
    use System\Http\Response;

    class ThreadController extends AbstractController
    {
        public function getTheards()
        {
            $model = new Thread($this->getDatabase());
            $result = $model->findAll();

            $response = new Response(200, json_encode($result));
            $response->send();

        }

        public function getThread(int $id)
        {
            $model = new Thread($this->getDatabase());
            $result = $model->find($id);

            $response = new Response(200, json_encode($result));
            $response->send();
        }

        public function getThreadPosts(int $id)
        {
            $model = new Post($this->getDatabase());
            $result = $model->getThreadPosts($id);

            $response = new Response(200, json_encode($result));
            $response->send();
        }
    }
