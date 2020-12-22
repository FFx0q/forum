<?php
    namespace Society\Application\Actions\Auth;

    use Psr\Http\Message\ResponseInterface as Response;
    use Firebase\JWT\JWT;

    class TokenAuthAction extends AuthAction
    {
        const KEY = 'society';
        protected function action(): Response
        {
            $body = $this->getFormData();
            $user = $this->userRepository->ofLogin($body->login);

            if (!$user || !password_verify($body->password, $user->password)) {
                return $this->respondWithData(['message' => 'Login Failed.'], 401);
            }
            
            $issuedAt   = time();
            $notBefore  = $issuedAt + 10;             
            $expire     = $notBefore + 60; 

            $token = [
                'iat' => $issuedAt,
                'jti' => base64_encode(random_bytes(32)),
                'nbf' => $notBefore,
                'exp' => $expire,
                'data' => [
                    'id' => $user->id->id(),
                    'login' => $user->login
                ]
            ];

            $jwt = JWT::encode($token, SELF::KEY, 'HS256');

            return $this->respondWithData([
                'uid' => $token['data']['id'],
                'login' => $token['data']['login'],
                'token' => $jwt
            ], 200);
        }

    }
