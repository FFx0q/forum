<?php
    namespace Society\Application\Actions\User;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\User\UserId;
    use Society\Domain\User\UserNotFoundException;

    class DeleteUserAction extends UserAction
    {
        protected function action(): Response
        {
            $userId = $this->resolveArg('id');
            $user = $this->userRepository->ofId(new UserId($userId));

            if (!$user) {
                throw new UserNotFoundException("User with id {$userId} is not found");
            }
            
            $this->userRepository->remove($user);

            return $this->respondWithData("User with id {$userId} was removed.", 204);
        }
    }
