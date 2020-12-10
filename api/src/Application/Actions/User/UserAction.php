<?php
    namespace Society\Application\Actions\User;

    use Society\Application\Actions\Action;
use Society\Domain\Post\PostRepository;
use Society\Domain\User\UserRepository;

    abstract class UserAction extends Action
    {
        protected UserRepository $userRepository;
        protected PostRepository $postRepository;

        public function __construct(UserRepository $userRepository, PostRepository $postRepository)
        {
            parent::__construct();
            
            $this->userRepository = $userRepository;
            $this->postRepository = $postRepository;
        }
    }