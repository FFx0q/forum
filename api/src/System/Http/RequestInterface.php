<?php
    namespace System\Http;

    interface RequestInterface
    {
        public function getUri();
        public function getMethod();
    }