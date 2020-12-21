<?php
    namespace Society\Application\Actions\Post;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\Post\Post;
    use Society\Domain\User\UserId;

    class ListPostAction extends PostAction
    {
        protected function action(): Response
        {
            $posts = array_map(function (Post $post) {
                $user = $this->userRepository->ofId(new UserId($post->author->id()));
                return [
                    'id' => $post->id->id(),
                    'author' => $user,
                    'content' => $post->body->content(),
                    'updatedAt' => $post->updatedAt->format('Y-m-d H:i:s'),
                    'createdAt' => $post->createdAt->format('Y-m-d H:i:s')
                ];
            }, $this->postRepository->all());

            return $this->respondWithData($posts);
        }
    }
