<?php
    namespace System\Http;

    class Request
    {
        private $headers = [];

        public function __construct()
        {
            foreach ($_SERVER as $key => $value) {
                if (substr($key, 0, 5) == 'HTTP_') {
                    $this->headers[$key] = $value;
                }
                $this->{$this->toCamelCase($key)} = $value;
            }
        }

        private function toCamelCase(string $string) : string
        {
            $result = strtolower($string);
            preg_match_all('/_[a-z]/', $result, $matches);

            foreach ($matches[0] as $match) {
                $char = str_replace("_", "", strtoupper($match));
                $result = str_replace($match, $char, $result);
            }

            return $result;
        }

        public function getHeaders()
        {
            return $this->headers;
        }
    }
