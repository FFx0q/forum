<?php
    use Slim\App;
    use Slim\Routing\RouteCollectorProxy as Group;

    use Society\Application\Actions\Auth\TokenAuthAction;
    use Society\Application\Actions\User\{
        CreateUserAction,
        ListUserAction,
        ViewUserAction,
        DeleteUserAction
    };

    use Society\Application\Actions\Post\{
        ListPostAction,
        CreatePostAction
    };
    use Society\Application\Actions\PreflightAction;

    return function (App $app) {
        $app->group('/api/v1', function(Group $group) {
            $group->group('/auth', function (Group $group) {
                $group->post('', TokenAuthAction::class);
                $group->options('', PreflightAction::class);
            });
            
            $group->group('/users', function (Group $group) {
                $group->get('', ListUserAction::class);
                $group->post('', CreateUserAction::class);
                $group->get('/{login}', ViewUserAction::class);
                $group->delete('/{id}', DeleteUserAction::class);
                $group->options('', PreflightAction::class);
            });

            $group->group('/posts', function(Group $group) {
                $group->get('', ListPostAction::class);
                $group->post('', CreatePostAction::class);
                $group->options('', PreflightAction::class);
            });
        });
    };
