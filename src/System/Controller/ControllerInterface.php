<?php
    namespace System\Controller;

    interface ControllerInterface
    {
        public function handle(int $id, string $method);
    }