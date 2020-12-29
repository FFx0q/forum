<?php
    namespace Society\Application\Actions\Follower;

    use Psr\Container\ContainerInterface;
    use Society\Application\Actions\Action;
    use Society\Domain\Follower\FollowerRepository;

    abstract class FollowerAction extends Action
    {
        protected FollowerRepository $followerRepository;
        
        public function __construct(ContainerInterface $container)
        {
            parent::__construct($container);

            $this->followerRepository = $this->getRepository(FollowerRepository::class);
        }
    }