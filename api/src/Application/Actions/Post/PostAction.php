<?php
    namespace Society\Application\Actions\Post;

    use Society\Application\Actions\Action;
    use Society\Domain\Post\PostRepository;

    abstract class PostAction extends Action
    {
        protected PostRepository $postRepository;

        public function __construct(PostRepository $postRepository)
        {
            parent::__construct();

            $this->postRepository = $postRepository;
        }
    }