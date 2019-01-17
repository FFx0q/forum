<?php
    use function DI\create;
    use function DI\get;

    return [
        \App\Base\Request::class => create(),
        \App\Base\Route::class => create()->constructor(get(\App\Base\Request::class))
    ];
