<?php
    namespace Application\Controller;

    use Application\Model\User;
    use Application\Model\Thread;
    use Application\Model\Post;
    
    use System\Controller\AbstractController;
    use System\Http\Response;

    class UserController extends AbstractController
    {
        public function getUsers()
        {
            $model = new User();
            $result = $model->findAll();

            return new Response(200, json_encode($result));
        }

        public function getUser(int $id = null)
        {
            $model = new User();
            $result = $model->find($id);

            return new Response(200, json_encode($result));
        }

        public function getUserThreads(int $id = null)
        {
            $model = new Thread();
            $result = $model->userThreads($id);

            return new Response(200, json_encode($result));
        }

        public function getUserPosts(int $id = null)
        {
            $model = new Post();
            $result = $model->userPosts($id);

            return new Response(200, json_encode($result));
        }
    }
