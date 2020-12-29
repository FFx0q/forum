<?php
    namespace Society\Domain\Follower;

    use Society\Domain\User\UserId;

    interface FollowerRepository
    {
        public function getFollowers(UserId $id): array;
        public function getFollows(UserID $id): array;
        public function remove(Follower $follower);
        public function save(Follower $follower);
    }
