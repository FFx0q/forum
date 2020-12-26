<?php
    namespace Society\Domain\Post;

    class PostBody
    {
        private string $content;

        public function __construct(string $content)
        {
            $this->setContent($content);
        }

        private function setContent(string $content)
        {
            if (empty($content)) {
                throw new PostException("Body is empty");
            }

            $this->content = $content;
        }

        public function content(): string
        {
            return $this->content;
        }
    }
