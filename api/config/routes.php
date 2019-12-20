<?php
    use System\Route\Route;
    use System\Route\RouteCollection;

    $collection = new RouteCollection();

    // Category Routes
    $collection->attachRoute(new Route("/category", "CategoryController#getCategories"));
    $collection->attachRoute(new Route("/category/([0-9]+)", "CategoryController#getCategory"));

    // Threads Routes
    $collection->attachRoute(new Route("/threads", 'ThreadController#getThreads'));
    $collection->attachRoute(new Route("/threads/([0-9]+)", "ThreadController#getThread"));
    $collection->attachRoute(new Route("/threads/([0-9]+)/posts", "ThreadController#getThreadPosts"));

    // Posts Routes
    $collection->attachRoute(new Route("/posts", "PostController#getPosts"));
    $collection->attachRoute(new Route("/posts/([0-9]+)", "PostController#getPosts"));
    
    return $collection;
