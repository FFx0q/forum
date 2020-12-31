<?php
    namespace Society\Application\Actions\Follower;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\Follower\Follower;
    use Society\Domain\User\UserId;

    class Create extends FollowerAction
    {
        protected function action(): Response
        {
            $body = $this->getFormData();
            $follow = new Follower(new UserId($body->uid), new UserId($body->fid));
            
            $this->followerRepository->save($follow);

            return $this->respondWithData($follow, 201);
        }
    }