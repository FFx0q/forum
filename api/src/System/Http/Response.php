<?php
    namespace System\Http;

    use System\Http\{ResponseInterface, MessageTrait};

    class Response implements ResponseInterface
    {
        use MessageTrait;

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

        public function __construct(int $statusCode, $body = null, string $version = '1.1')
        {
            $this->setStatusCode($statusCode);
            $this->setBody($body);
            $this->setProtocolVersion($version);
        }

        public function prepare() : object
        {
            $request = new Request($_SERVER);
            
            // Check HTTP Version
            if ("HTTP/1.1" != $request->get('SERVER_PROTOCOL')) {
                $this->setProtocolVersion("1.1");
            }

            // Fix Content-Type
            if (!$request->has('Content-Type')) {
                $request->set('Content-Type', "application/json; charset=UTF-8");
            }

            // Fix Content-Length
            if ($request->has('Transfer-Encoding')) {
                $request->remove('Content-Length');
            }

            // set Access-Control-Allow-Origin
            $request->add('Access-Control-Allow-Origin', '*');
            
            $this->setHeaders($request->getHeaders());

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
            
            header(sprintf("HTTP/%s %s %s", $this->protocolVersion, $this->statusCode, $this->statusText), true, $this->statusCode);

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

        public function getReasonPhrase()
        {
            return $this->statusText;
        }
    }
