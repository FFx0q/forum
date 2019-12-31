<?php
    namespace System\Http;

    use System\Http\RequestInterface;
    use System\Http\MessageTrait;

    class Request implements RequestInterface
    {
        use MessageTrait;

        private $headers = [];

        public function __construct(array $headers = [])
        {
            $this->headers = $headers;
        }

        public function getUri()
        {
            return $this->get('REQUEST_URI');
        }

        public function getMethod()
        {
            return $this->get('REQUEST_METHOD');
        }
    }
