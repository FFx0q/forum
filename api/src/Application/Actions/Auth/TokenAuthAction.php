<?php
    namespace Society\Application\Actions\Auth;

    use Psr\Http\Message\ResponseInterface as Response;
    use \Firebase\JWT\JWT;
    use Society\Application\Actions\Auth\AuthAction;
    use Society\Domain\User\UserNotFoundException;

    class TokenAuthAction extends AuthAction
    {
        const KEY = 'DEV';
        protected function action(): Response
        {
            $body = $this->getFormData();
            $user = $this->userRepository->ofLogin($body->login);

            if (!$user) {
                throw new UserNotFoundException();
            }
            if (!password_verify($body->password, $user->password)) {
                throw new \Exception('password doesn\'t match');
            }
            
            $payload = [
                'uid' => $user->id->id(),
                'login' => $user->login
            ];

            $jwt = JWT::encode($payload, SELF::KEY);

            return $this->respondWithData([
                'user' => [
                    'token' => $jwt,
                    'uid' => $payload['uid'],
                    'login' => $payload['login']
                ]
            ], 200);
        }
    }
