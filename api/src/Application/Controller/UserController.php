<?php
    namespace Application\Controller;

    use System\Controller\AbstractController;
    use System\Http\Response;

    use Application\Model\{User, Thread, Post};

    class UserController extends AbstractController
    {
        public function getUsers()
        {
            $model = new User();
            $result = $model->findAll();

            $response = new Response(200, json_encode($result));
            return $response;
        }

        public function getUser(int $id = null)
        {
            $model = new User();
            $result = $model->find($id);

            $response = new Response(200, json_encode($result));
            return $response;
        }

        public function getUserThreads(int $id = null)
        {
            $model = new Thread();
            $result = $model->userThreads($id);

            $response = new Response(200, json_encode($result));
            return $response;
        }

        public function getUserPosts(int $id = null)
        {
            $model = new Post();
            $result = $model->userPosts($id);

            $response = new Response(200, json_encode($result));
            return $response;
        }
    }
