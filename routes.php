<?php
    use App\Base\Route;

    return [
        new Route('Home', 'index', '|^/?$|'),
        new Route('Home', 'index', '|^home/?$|'),

        new Route('Login', 'index', '|^login/?$|'),
        new Route('Login', 'login', '|^login/login/?$|'),
        new Route('Login', 'logout', '|^login/logout/?$|'),

        new Route('Register', 'index', '|^register/?$|'),
        new Route('Register', 'register', '|^register/register/?$|'),

        new Route('User', 'list', '|^user/list/?$|'),
        new Route('User', 'profile', '|^user/profile/([0-9]+)/?$|'),

        new Route('Question', 'show', '|^question/show/([0-9]+)/?$|'),
        new Route('Question', 'create', '|^question/create/?$|'),
        new Route('Question', 'save', '|^question/save/?$|'),

        new Route('Post', 'create', '|^post/create/([0-9]+)/?$|'),

        new Route('Settings', 'index', '|^settings/?$|'),
        
    ];