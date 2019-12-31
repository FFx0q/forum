<?php
    namespace System\Database;

    use PDO;

    interface DatabaseInterface
    {
        public function getConnection() : PDO;
        public function close() : void;
    }
