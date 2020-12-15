<?php
    namespace Society\Application\Actions\Auth;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\User\User;
use Society\Domain\User\UserId;

    class RegisterAuthAction extends AuthAction
    {
        protected function action(): Response
        {
            $body = $this->getFormData();

            $id = new UserId();
            $password = password_hash($body->password, PASSWORD_DEFAULT);

            $user = new User($id, $body->login, $password, $body->email);
            $this->userRepository->save($user);
            
            return $this->respondWithData([
                'id' => $user->id->id(),
                'login' => $user->login,
                'password' => $user->password,
                'email' => $user->email,
                'createdAt' => $user->createdAt
            ], 201);
        }
    }
