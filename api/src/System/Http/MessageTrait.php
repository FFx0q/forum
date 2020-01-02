<?php
    namespace System\Http;

    trait MessageTrait
    {
        private $protocol = '1.1';
        private $body;
        private $headers = [];

        public function getProtocolVersion()
        {
            return $this->protocol;
        }

        public function setProtocolVersion(string $protocol)
        {
            $this->protocol = $protocol;

            return $this;
        }
        public function getHeaders()
        {
            return $this->headers;
        }

        public function setHeaders($headers)
        {
            $this->headers = $headers;
        }

        public function setBody($content) : object
        {
            $this->body = $content;

            return $this;
        }

        public function getBody()
        {
            return $this->body;
        }

        public function get($header)
        {
            if (!$this->has($header)) {
                return null;
            }

            return $this->headers[$header];
        }

        public function has($header)
        {
            return isset($this->headers[$header]);
        }

        public function set($header, $value)
        {
            $this->headers[$header] = $value;
        }

        public function add($header, $value)
        {
            $this->headers[$header] = $value;
        }

        public function remove($header)
        {
            unset($this->headers[$header]);
        }
    }
