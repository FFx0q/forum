<?php
    namespace System\Http;

    interface ResponseInterface
    {
        public function getStatusCode();
        public function getReasonPhrase();
    }
