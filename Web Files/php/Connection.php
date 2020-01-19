<?php
    #class written by Ronald Tavarez for CANDEV 2020
    #connection class created only for mysql database connection and query submit
    class Connection{

        #private fields
        private $connection; #stores mysqli connection object
        private $db_host = "localhost"; #database host
        private $db_user = "postgres"; #database username
        private $db_pass = "2712875yZ"; #database password
        private $db = "postgres";

        #each time connection to database is needed a new connection must be constructed
        public function __construct(){
            try{ #try to connect to database
                $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db); #constructs new mysqli connection object and stores it within connection field
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