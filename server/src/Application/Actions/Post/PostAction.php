<?php
    namespace Society\Application\Actions\Post;

    use Psr\Container\ContainerInterface;
    use Society\Application\Actions\Action;
    use Society\Domain\Post\PostRepository;
    use Society\Domain\User\UserRepository;

    abstract class PostAction extends Action
    {
        protected PostRepository $postRepository;
        protected UserRepository $userRepository;
        
        public function __construct(ContainerInterface $container)
        {
            parent::__construct($container);

            $this->userRepository = $this->getRepository(UserRepository::class);
            $this->postRepository = $this->getRepository(PostRepository::class);
        }
    }
