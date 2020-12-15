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
                    'author' => [
                        'id' => $user->id->id(),
                        'login' => $user->login
                    ],
                    'content' => $post->body->content(),
                    'updatedAt' => $post->updatedAt,
                    'createdAt' => $post->createdAt
                ];
            }, $this->postRepository->all());

            return $this->respondWithData($posts);
        }
    }
