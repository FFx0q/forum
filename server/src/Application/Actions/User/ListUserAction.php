<?php
    namespace Society\Application\Actions\User;

    use Psr\Http\Message\ResponseInterface as Response;

    class ListUserAction extends UserAction
    {
        protected function action(): Response
        {
            $users = array_map(function($user) {
                return [
                    'id' => $user->id->id(),
                    'login' => $user->login,
                    'email' => $user->email,
                    'createdAt' => $user->createdAt->format('Y-m-d H:i:s'),
                    'followers' => array_map(function ($follow) {
                        return $this->userRepository->ofId($follow->fid);
                    }, $this->followerRepository->getFollowers($user->id)),
                    'following' =>  array_map(function ($follow) {
                        return $this->userRepository->ofId($follow->uid);
                    }, $this->followerRepository->getFollows($user->id)),
                ];
            }, $this->userRepository->all());

            return $this->respondWithData($users);
        }
    }
