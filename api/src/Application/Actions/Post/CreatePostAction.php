<?php
    namespace Society\Application\Actions\Post;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\Post\Post;
use Society\Domain\Post\PostBody;
use Society\Domain\Post\PostId;
    use Society\Domain\User\UserId;

    class CreatePostAction extends PostAction
    {
        protected function action(): Response
        {
            $body = $this->getFormData();

            $post = new Post(new PostId(), new UserId($body->userId), new PostBody($body->content));
            $this->postRepository->save($post);

            return $this->respondWithData($post, 201);
        }
    }
