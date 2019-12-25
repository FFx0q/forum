<?php
    namespace Application\Controller;

    use System\Controller\AbstractController;
    use System\Http\Response;

    use Application\Model\{User, Thread, Post};

    class UserController extends AbstractController
    {
        public function getUsers()
        {
            $model = new User($this->getDatabase());
            $result = $model->findAll();

            $response = new Response(200, json_encode($result));
            return $response;
        }

        public function getUser(int $id = null)
        {
            $model = new User($this->getDatabase());
            $result = $model->find($id);

            $response = new Response(200, json_encode($result));
            return $response;
        }

        public function getUserThreads(int $id = null)
        {
            $model = new Thread($this->getDatabase());
            $result = $model->userThreads($id);

            $response = new Response(200, json_encode($result));
            return $response;
        }

        public function getUserPosts(int $id = null)
        {
            $model = new Post($this->getDatabase());
            $result = $model->userPosts($id);

            $response = new Response(200, json_encode($result));
            return $response;
        }
    }
