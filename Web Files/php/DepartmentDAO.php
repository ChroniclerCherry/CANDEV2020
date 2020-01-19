<?php
    #Class written by Ronald Tavarez for CANDEV 2020
    #class for handling query error checking for mysql database
    require_once('Connection.php'); #DB CONNECTION CLASS
    require_once('Department.php'); #Deparment class

    class DepartmentDAO extends Connection {

        #constructor
        public function __construct(){
            try{
                parent::__construct();#call superclass constructor
            } catch (mysqli_sql_exception $e){ #catch exception
                throw $e; #throw exception
            }
        }

        #query database for all departments
        public function getDepartments(){
            $query_result = $this->connection->query('SELECT * FROM ');
            $departments = (array) null;

            #if query is not empty
            if ($query_result->num_rows >= 1){
                while ($row = $query_result->fetch_assoc()){ #while query has results
                    $departments[] = new Department($row['id'], $row['department'], $row['departmentCode'], 
                    $row['programStreamName'], $row['subProgramStreamName'], $row['transferPaymentProgram'], 
                    $row['DRFProgram'], $row['programCode'], $row['programStreamId'], $row['intermediaries'], 
                    $row['namedRecipient']);
                }
                $query_result->free(); #free memory
                return $departments; #return database rows
            }
            $query_result->free(); #free memory
            return false;
        }

        public function addDepartment($department){
            #if there isn't an error connecting to db
            if (!$this->connection->connect_errno){
                $query_add = 'INSERT INTO department VALUES (?,?,?,?,?,?,?,?,?,?,?)';
                $stmt = $this->connection->prepare($query_add);
                $stmt->bind_param('sissssiiii', $department->getDepartment(),
                                                $department->getDepartmentCode(),
                                                $department->getProgramStreamName(),
                                                $department->getSubProgramStreamName(),
                                                $department->getTransferPaymentProgram(),
                                                $department->getDRFProgram(),
                                                $department->getProgramCode(),
                                                $department->getProgramStreamId(),
                                                $department->getIntermediaries(),
                                                $department->getNameRecipient());
                $stmt->execute();
                if ($stmt->error){
                    return $stmt->error;
                } else {
                    return $department->getDepartment().' Added successfully ';
                }
            } else {
                return 'Could not connect to Database';
            }
        }
        
    }
?>