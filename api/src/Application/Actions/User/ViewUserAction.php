<?php
    namespace Society\Application\Actions\User;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\User\UserId;
    use Society\Domain\User\UserNotFoundException;

    class ViewUserAction extends UserAction
    {
        protected function action(): Response
        {
            $userId = $this->resolveArg('id');
            $user = $this->userRepository->ofId(new UserId($userId));

            if (!$user) {
                throw new UserNotFoundException("User was not found");
            }

            return $this->respondWithData([
                'id' => $user->id->id(),
                'login' => $user->login,
                'email' => $user->email,
                'createdAt' => $user->createdAt
            ], 200);
        }
    }
