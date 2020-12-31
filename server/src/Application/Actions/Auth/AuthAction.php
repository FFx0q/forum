<?php
    namespace Society\Application\Actions\Auth;

    use Psr\Container\ContainerInterface;
    use Society\Application\Actions\Action;
    use Society\Domain\User\UserRepository;

    abstract class AuthAction extends Action
    {
        protected UserRepository $userRepository;
        
        public function __construct(ContainerInterface $container)
        {
            parent::__construct($container);

            $this->userRepository = $this->getRepository(UserRepository::class);
        }
    }
