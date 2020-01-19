<?php
    #class written by Ronald Tavarez for CANDEV 2020
    #connection class created only for mysql database connection and query submit
    class Connection{

        #private fields
        protected $connection; #stores mysqli connection object
        protected static $db_host = "localhost"; #database host
        protected static $db_user = "candev"; #database username
        protected static $db_pass = "candev"; #database password
        protected static $db = "candev";

        #each time connection to database is needed a new connection must be constructed
        public function __construct(){
            try{ #try to connect to database
                $this->connection = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db); #constructs new mysqli connection object and stores it within connection field
            } catch (mysqli_sql_exception $e){ #catch exception
                throw $e; #throw exception
            }
        }

        #function for getting connection object
        public function getConnection(){
            #returns connection object
            return $this->connection;
        }
    }
?>