<?php
    namespace System\Http;

    class Request
    {
        private $headers = [];
        private $method;
        private $url;

        public function __construct(array $headers = [])
        {
            $this->headers = $headers;
        }

        public function getUrl() : string
        {
            return $this->url;
        }

        public function getMethod() : string
        {
            return $this->method;
        }

        public function getHeaders() : array
        {
            return $this->headers;
        }

        public function has(string $key)
        {
            return isset($this->headers[$key]);
        }

        public function get(string $key)
        {
            return $this->headers[$key];
        }

        public function add(string $key, $value)
        {
            $this->headers[$key] = $value;
        }

        public function set(string $key, $value)
        {
            $this->headers[$key] = $value;
        }
    }
