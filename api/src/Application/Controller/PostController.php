<?php

    namespace Application\Controller;

    use Application\Model\Post;
    use System\Controller\AbstractController;
    use System\Http\Response;

    class PostController extends AbstractController
    {
        public function getPosts()
        {
            $model = new Post();
            $result = $model->findAll();

            $response = new Response(200, json_encode($result));
            return $response;
        }

        public function getPost(int $id)
        {
            $model = new Post();
            $result = $model->find($id);

            $response = new Response(200, json_encode($result));
            return $response;
        }
    }
