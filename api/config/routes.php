<?php
    use Slim\App;
    use Slim\Interfaces\RouteCollectorProxyInterface as Group;

    use Society\Application\Actions\User\{
        ListUserAction,
        ViewUserAction,
        DeleteUserAction,
        CreateUserAction
    };

    use Society\Application\Actions\Post\{
        ListPostAction
    };

    return function (App $app) {
        $app->group('/user', function (Group $group) {
            $group->get('', ListUserAction::class);
            $group->get('/{username}', ViewUserAction::class);
            $group->post('/', CreateUserAction::class);
            $group->delete('/{id}', DeleteUserAction::class);
        });

        $app->group('/post', function(Group $group) {
            $group->get('', ListPostAction::class);
        });
    };