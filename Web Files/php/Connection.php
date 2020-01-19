<?php
    #class written by Ronald Tavarez for CANDEV 2020
    #connection class created only for mysql database connection and query submit
    class Connection{

        #private fields
        private $connection; #stores mysqli connection object
        private $db_host = "localhost"; #database host
        private $db_user = "root"; #database username
        private $db_pass = "Ronaldtavarez4385!"; #database password
        private $db = "candev_2020";

        #each time connection to database is needed a new connection must be constructed
        public function __construct(){
            try{ #try to connect to database
                $this->connection = new mysqli('localhost', 'root', 'megaman4385', 'candev_2020'); #constructs new mysqli connection object and stores it within connection field
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