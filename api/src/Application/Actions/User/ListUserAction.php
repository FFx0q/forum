<?php
    namespace Society\Application\Actions\User;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\User\User;

    class ListUserAction extends UserAction
    {
        protected function action(): Response
        {
            $users = array_map(function (User $user) {
                return [
                   'id' => $user->id->id(),
                   'login' => $user->login,
                   'email' => $user->email,
                   'createdAt' => $user->createdAt
               ];
            }, $this->userRepository->all());

            return $this->respondWithData($users);
        }
    }
