<?php
    namespace Society\Domain\Post;

    use Society\Domain\User\UserId;

    interface PostRepository
    {
        public function all(): array;
        public function ofAuthor(UserId $id): array;
        public function save(Post $post);
    }
