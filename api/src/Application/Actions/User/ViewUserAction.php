<?php
namespace Society\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;
use Society\Domain\User\UserNotFoundException;

class ViewUserAction extends UserAction
{
    protected function action(): Response
    {
        $username = $this->resolveArg('username');
        $user = $this->userRepository->ofUsername($username);

        if (!$user) {
            throw new UserNotFoundException("User was not found");
        }

        return $this->respondWithData($user);
    }
}