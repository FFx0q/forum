<?php
    namespace Society\Application\Actions\Post;

    use Psr\Http\Message\ResponseInterface as Response;

    class ListPostAction extends PostAction
    {

        protected function action(): Response
        {
            $posts = $this->postRepository->all();

            return $this->respondWithData($posts);
        }
    }