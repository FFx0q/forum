<?php
    use System\Route\Route;
    use System\Route\RouteCollection;

    $collection = new RouteCollection();

    // Category Routes
    $collection->attachRoute(new Route("/category", "CategoryController#getCategories"));
    $collection->attachRoute(new Route("/category/([0-9]+)", "CategoryController#getCategory"));
    $collection->attachRoute(new Route("/category/([0-9]+)/subcategories", "CategoryController#getSubCategories"));

    // Thread Routes
    $collection->attachRoute(new Route("/threads", 'ThreadController#getThreads'));
    $collection->attachRoute(new Route("/threads/([0-9]+)", "ThreadController#getThread"));
    $collection->attachRoute(new Route("/threads/([0-9]+)/posts", "ThreadController#getThreadPosts"));

    // Post Routes
    $collection->attachRoute(new Route("/posts", "PostController#getPosts"));
    $collection->attachRoute(new Route("/posts/([0-9]+)", "PostController#getPosts"));

    // User Routes
    $collection->attachRoute(new Route("/users", 'UserController#getUsers'));
    $collection->attachRoute(new Route("/users/([0-9]+)", "UserController#getUser"));
    $collection->attachRoute(new Route("/users/([0-9]+)/threads", "UserController#getUserThreads"));
    $collection->attachRoute(new Route("/users/([0-9]+)/posts", "UserController#getUserPosts"));
    
    return $collection;
