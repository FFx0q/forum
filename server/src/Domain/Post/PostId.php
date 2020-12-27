<?php
    namespace Society\Domain\Post;

    use Ramsey\Uuid\Uuid;

    class PostId
    {
        private $id;

        public function __construct($id = null)
        {
            $this->id = $id ?: Uuid::uuid4()->toString();
        }
        public function id()
        {
            return $this->id;
        }

        public function __toString()
        {
            return $this->id;
        }
    }
