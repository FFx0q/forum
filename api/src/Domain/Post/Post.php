<?php
    namespace Society\Domain\Post;

    use DateTime;
    use Society\Domain\User\UserId;

    class Post
    {
        public PostId $id;
        public UserId $author;
        public PostBody $body;
        public ?DateTime $createdAt;
        public ?DateTime $updatedAt;

        public function __construct(
            PostId $id,
            UserId $author,
            PostBody $body,
            DateTime $createdAt = null,
            DateTime $updatedAt = null
        ) {
            $this->id = $id;
            $this->author = $author;
            $this->body = $body;
            $this->createdAt = $createdAt ?: new DateTime;
            $this->updatedAt = $updatedAt ?: new DateTime;
        }
    }
