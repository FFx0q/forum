<?php
    namespace System\Http;

    class Response
    {
        private $statusCode;
        private $statusText;
        private $body;
        private $protocolVersion;
        private $headers = [];

        public static $statusTexts = [
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            204 => 'No Content',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            408 => 'Request Timeout',
            500 => 'Internal Server Error',
            502 => 'Bad Gateway',
        ];

        public function __construct(int $statusCode, $body)
        {
            $this->setStatusCode($statusCode);
            $this->setBody($body);
            $this->setProtocolVersion("1.1");
        }

        public function prepare() : object
        {
            $request = new Request;
            //prepare headers
            $headers = $request->getHeaders();

            // Check HTTP Version
            if ("HTTP/1.1" != $request->serverProtocol) {
                $this->setProtocolVersion("1.1");
            }

            // set Content-Type to application/json
            $headers['Content-Type'] = "application/json";

            $headers['Access-Control-Allow-Origin'] = "*";

            $this->setHeaders($headers);

            return $this;
        }

        public function sendHeaders() : object
        {
            if (headers_sent()) {
                return $this;
            }

            foreach ($this->getHeaders() as $name => $value) {
                header($name . ": ". $value, false, $this->getStatusCode());
            }
            
            header(sprintf("HTTP/%s %s %s", $this->protocolVersion, $this->statusCode, $this->statusText), false, $this->statusCode);

            return $this;
        }

        public function sendBody() : object
        {
            echo $this->body;

            return $this;
        }

        public function send()
        {
            $this->prepare();
            $this->sendHeaders();
            $this->sendBody();

            return $this;
        }
        public function setStatusCode(int $code, $text = null) : object
        {
            $this->statusCode = $code;

            if ($text === null) {
                $this->statusText = self::$statusTexts[$code] ?? "unknows status";
            }

            if ($text === false) {
                $this->statusText = "";
                
                return $this;
            }

            $this->statusText = $text;
            
            return $this;
        }

        public function getStatusCode() : int
        {
            return $this->statusCode;
        }

        public function setBody($content) : object
        {
            $this->body = $content;

            return $this;
        }

        public function getBody($content)
        {
            return $this->body;
        }

        public function setProtocolVersion(string $version) : object
        {
            $this->protocolVersion = $version;

            return $this;
        }

        public function getProtocolVersion() : string
        {
            return $this->protocolVersion;
        }

        public function setHeaders($headers) : object
        {
            $this->headers = $headers;

            return $this;
        }

        public function getHeaders()
        {
            return $this->headers;
        }
    }
