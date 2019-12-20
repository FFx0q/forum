<?php
    namespace System\Controller;

    interface ControllerInterface
    {
        public function handle(string $method, int $id);
        public function notFound();
    }
