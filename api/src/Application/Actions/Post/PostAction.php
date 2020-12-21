<?php
    namespace Society\Application\Actions\Post;

    use Society\Application\Actions\Action;
    use Society\Domain\Post\PostRepository;
    use Society\Domain\User\UserRepository;

    abstract class PostAction extends Action
    {
        protected PostRepository $postRepository;
        protected UserRepository $userRepository;
        
        public function __construct(PostRepository $postRepository, UserRepository $userRepository)
        {
            parent::__construct();

            $this->postRepository = $postRepository;
            $this->userRepository = $userRepository;
        }
    }
