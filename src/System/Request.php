<?php
    namespace App\Base;
    class Request 
    {
        public static function getUri()
        {
            $request = filter_input(INPUT_SERVER, 'REQUEST_URI');
            return ltrim($request, $request[0]);       
        }
    }