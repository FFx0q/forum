<?php
    use Slim\App;
    use Society\Application\Actions\PreflightAction;

    use Society\Application\Actions\Auth\{
        LoginAuthAction,
        RegisterAuthAction
    };

    use Society\Application\Actions\User\{
        ListUserAction,
        ViewUserAction,
        DeleteUserAction,
    };

    use Society\Application\Actions\Post\{
        ListPostAction,
        CreatePostAction
    };

    return function (App $app) {
        $app->post('/auth/register', RegisterAuthAction::class);
        $app->post('/auth/login', LoginAuthAction::class);
        $app->options('/auth/login', PreflightAction::class);
        
        $app->get('/user', ListUserAction::class);
        $app->get('/user/{id}', ViewUserAction::class);
        $app->options('/user', PreflightAction::class);

        $app->get('/post', ListPostAction::class);
        $app->post('/post', CreatePostAction::class);
        $app->options('/post', PreflightAction::class);
    };
