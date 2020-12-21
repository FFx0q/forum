<?php
    namespace Society\Application\Actions\Auth;

    use Society\Application\Actions\Action;
    use Society\Domain\User\UserRepository;

    abstract class AuthAction extends Action
    {
        protected UserRepository $userRepository;
        
        public function __construct(UserRepository $userRepository)
        {
            parent::__construct();

            $this->userRepository = $userRepository;
        }
    }
