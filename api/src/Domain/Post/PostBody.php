<?php
    namespace Society\Domain\Post;

    use Rhumsaa\Uuid\Console\Exception;

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
                throw new \DomainException('body is empty');
            }

            $this->content = $content;
        }

        public function content(): string
        {
            return $this->content;
        }
    }
