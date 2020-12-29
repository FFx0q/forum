<?php
    namespace Society\Application\Actions\Follower;
    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\Follower\Follower;
    use Society\Domain\User\UserId;

    class Delete extends FollowerAction
    {
        protected function action(): Response
        {
            $uid = $this->resolveArg('uid');
            $fid = $this->resolveArg('fid');

            $follow = new Follower(new UserId($uid), new UserId($fid));
            $this->followerRepository->remove($follow);

            return $this->respondWithData(null, 204);
        }
    }
