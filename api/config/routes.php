<?php
    return [
        ["GET", "/category", "getCategories"],
        ["GET", "/category/{id}", "getCategory"],
        ["GET", "/category/{id}/subcategories", "getSubCategories"],

        ["GET", "/thread", "getThreads"],
        ["GET", "/thread/{id}", "getThread"],
        ["GET", "/thread/{id}/posts", "getThreadPosts"],

        ["GET", "/post", "getPosts"],
        ["GET", "/post/{id}", "getPost"],

        ["GET", "/user", "getUsers"],
        ["GET", "/user/{id}", "getUser"],
        ["GET", "/user/{id}/threads", "getUserThreads"],
        ["GET", "/user/{id}/posts", "getUserPosts"]

    ];