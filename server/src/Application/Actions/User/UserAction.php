<?php
    namespace Society\Application\Actions\User;

    use Psr\Container\ContainerInterface;
    use Society\Application\Actions\Action;
    use Society\Domain\Follower\FollowerRepository;
    use Society\Domain\Post\PostRepository;
    use Society\Domain\User\UserRepository;

    abstract class UserAction extends Action
    {
        protected UserRepository $userRepository;
        protected PostRepository $postRepository;
        protected FollowerRepository $followerRepository;

        public function __construct(ContainerInterface $containerInterface)
        {
            parent::__construct($containerInterface);
            
            $this->userRepository = $this->getRepository(UserRepository::class);
            $this->postRepository = $this->getRepository(PostRepository::class);
            $this->followerRepository = $this->getRepository(FollowerRepository::class);
        }
    }
