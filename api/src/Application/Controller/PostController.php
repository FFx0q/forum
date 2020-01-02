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

            if ($model->hasResult($result) === false) {
                return $this->notFound();
            }

            return new Response(200, json_encode($result));
        }

        public function getPost(int $id)
        {
            $model = new Post();
            $result = $model->find($id);

            if ($model->hasResult($result) === false) {
                return $this->notFound();
            }

            return new Response(200, json_encode($result));
        }
    }
