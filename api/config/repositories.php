<?php
    use DI\ContainerBuilder;
    use Society\Domain\Post\PostRepository;
    use Society\Domain\User\UserRepository;
    use Society\Infrastructure\Persistence\Post\SqlPostRepository;
    use Society\Infrastructure\Persistence\User\SqlUserRepository;
    use function DI\autowire;

    return function (ContainerBuilder $builder) {
        $builder->addDefinitions([
            UserRepository::class => autowire(SqlUserRepository::class)
        ]);
        $builder->addDefinitions([
            PostRepository::class => autowire(SqlPostRepository::class)
        ]);
    };
