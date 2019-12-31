<?php
    use System\Route\RouteCollection;

    $collection = new RouteCollection();

    $collection->group("/category", function () use ($collection) {
        $collection->get("/", "CategoryController#getCategories");
        $collection->get("/{id}", "CategoryController#getCategory");
        $collection->get("/{id}/subcategories", "CategoryController#getSubCategories");
    });

    $collection->group("/thread", function () use ($collection) {
        $collection->get("/", "ThreadController#getThreads");
        $collection->get("/{id}", "ThreadController#getThread");
        $collection->get("/{id}/posts", "ThreadController#getThreadPosts");
    });

    $collection->group("/post", function () use ($collection) {
        $collection->get("/", "PostController#getPosts");
        $collection->get("/{id}", "PostController#getPost");
    });

    $collection->group("/user", function () use ($collection) {
        $collection->get("/", "UserController#getUsers");
        $collection->get("/{id}", "UserController#getUser");
        $collection->get("/{id}/threads", "UserController#getUserThreads");
        $collection->get("/{id}/posts", "UserController#getUserPosts");
    });

    return $collection;
