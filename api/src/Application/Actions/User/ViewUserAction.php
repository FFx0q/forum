<?php
    namespace Society\Application\Actions\User;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\User\UserId;
    use Society\Domain\User\UserNotFoundException;

    class ViewUserAction extends UserAction
    {
        protected function action(): Response
        {
            $login = $this->resolveArg('login');
            $user = $this->userRepository->ofLogin($login);

            if (!$user) {
                throw new UserNotFoundException("User was not found");
            }
            $posts = $this->postRepository->ofAuthor($user->id);
            $result = [
                'id' => $user->id->id(),
                'login' => $user->login,
                'email' => $user->email,
                'createdAt' => $user->createdAt->format('Y-m-d H:i:s'),
                'posts' => $posts
            ];

            return $this->respondWithData($result, 200);
        }
    }
