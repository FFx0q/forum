<?php
    namespace Society\Domain\Follower;

    use JsonSerializable;
    use Society\Domain\User\UserId;

    class Follower implements JsonSerializable
    {
        public UserId $uid;
        public UserId $fid;

        public function __construct(UserId $uid, UserId $fid)
        {
            $this->uid = $uid;
            $this->fid = $fid;
        }

        public function jsonSerialize(): array
        {
            return [
                'uid' => $this->uid->id(),
                'fid' => $this->fid->id()
            ];
        }
    }