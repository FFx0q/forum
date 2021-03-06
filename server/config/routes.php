<?php
    use Slim\App;
    use Slim\Routing\RouteCollectorProxy as Group;

    use Society\Application\Middleware\AuthMiddleware;
    use Society\Application\Actions\Auth\TokenAuthAction;
    use Society\Application\Actions\User\CreateUserAction;
    use Society\Application\Actions\User\ListUserAction;
    use Society\Application\Actions\User\ViewUserAction;
    use Society\Application\Actions\User\DeleteUserAction;
    use Society\Application\Actions\Post\ListPostAction;
    use Society\Application\Actions\Post\CreatePostAction;
    use Society\Application\Actions\Follower;
    use Society\Application\Actions\PreflightAction;

    return function (App $app) {
        $app->group('/api/v1', function (Group $group) {
            $group->post('/auth', TokenAuthAction::class);
            $group->options('/auth', PreflightAction::class);
            
            $group->group('/users', function (Group $group) {
                $group->get('', ListUserAction::class)->add(AuthMiddleware::class);
                $group->post('', CreateUserAction::class);
                $group->get('/{login}', ViewUserAction::class)->add(AuthMiddleware::class);
                $group->delete('/{id}', DeleteUserAction::class)->add(AuthMiddleware::class);
                $group->options('/{login}', PreflightAction::class);
            });

            $group->group('/posts', function (Group $group) {
                $group->get('', ListPostAction::class)->add(AuthMiddleware::class);
                $group->post('', CreatePostAction::class)->add(AuthMiddleware::class);
                $group->options('', PreflightAction::class);
            });

            $group->group('/followers', function (Group $group) {
                $group->post('', Follower\Create::class)->add(AuthMiddleware::class);
                $group->delete('/{uid}/{fid}', Follower\Delete::class)->add(AuthMiddleware::class);
                $group->options('', PreflightAction::class);
                $group->options('/{uid}/{fid}', PreflightAction::class);
            });
        });
    };
