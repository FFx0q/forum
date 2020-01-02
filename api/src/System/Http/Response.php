<?php
    namespace System\Http;

    use System\Http\ResponseInterface;
    use System\Http\MessageTrait;

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

        public function __construct(int $code = 200, $body = '')
        {
            $this->setStatusCode($code);
            $this->setBody($body);
            $this->setProtocolVersion('1.1');
        }

        public function prepare() : object
        {
            $this->set('Date', gmdate( 'D, d M Y H:i:s T' ));
         
            foreach (getallheaders() as $key => $value) {
                $this->set($key, $value);
            }

            $this->set('Content-Type', 'application/json; charset=UTF-8');
            $this->set('Access-Control-Allow-Origin', '*');
            
            return $this;
        }

        public function sendHeaders() : object
        {
            if (headers_sent()) {
                return $this;
            }
            
            header(sprintf("HTTP/%s %s %s", $this->protocolVersion, $this->statusCode, $this->statusText), true, $this->statusCode);

            foreach ($this->getHeaders() as $name => $value) {
                if (!is_array($name)) {
                    header($name.': '.$value, 0, $this->statusCode);
                }
            }
            
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
