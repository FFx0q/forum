<?php

    namespace Application\Controller;

    use Application\Model\Post;
    use System\Controller\AbstractController;
    use System\Http\Response;

    class PostController extends AbstractController
    {
        public function handle(string $method, int $id = null)
        {
            switch ($method) {
                case "GET": {
                    if ($id === null) {
                        $this->getAllPosts();
                        break;
                    }
                    $this->getPost($id);
                    break;
                }
            }
        }

        public function getAllPosts()
        {
            $model = new Post($this->getDatabase());
            $result = $model->findAll();

            $response = new Response(200, json_encode($result));
            $response->send();

        }

        public function getPost(int $id)
        {
            $model = new Post($this->getDatabase());
            $result = $model->find($id);

            $response = new Response(200, json_encode($result));
            $response->send();
        }
    }