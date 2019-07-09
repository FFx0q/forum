<?php
    namespace App\Base;
    class Request 
    {
  
        public static function getUri()
        {
            $request = filter_input(INPUT_SERVER, 'REQUEST_URI');
            $request = ltrim($request, $request[0]);
            return $request;           
        }
    }