<?php
    namespace System\Controller;

    use System\Controller\ControllerInterface;
    
    abstract class AbstractController implements ControllerInterface
    {
        abstract public function handle(int $id, string $method);
    }