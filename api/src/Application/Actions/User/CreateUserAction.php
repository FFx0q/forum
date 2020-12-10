<?php
    namespace Society\Application\Actions\User;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\User\{User, UserId};

    class CreateUserAction extends UserAction
    {
        protected function action(): Response
        {
            $body = $this->getFormData();

            $user = new User(new UserId(), $body['username'], $body['password'], $body['email']);
            $this->userRepository->save($user);

            return $this->respondWithData($user, 201);
        }
    }