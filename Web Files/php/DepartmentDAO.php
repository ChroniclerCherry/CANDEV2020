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
            $query_result = $this->connection->query('SELECT * FROM TransferDepartment');
            $departments = (array) null;

            #if query is not empty
            if ($query_result->num_rows >= 1){
                while ($row = $query_result->fetch_assoc()){ #while query has results
                    array_push($departments, new Department($row['id'], $row['AGRG_PYMT_AMT'], $row['CNTRY_EN_NM'], 
                    $row['CTY_EN_NM'], $row['DEPT_EN_DESC'], $row['DEPARTMENTNUMBER'], 
                    $row['FSCL_YR'], $row['MINC'], $row['MINE'], $row['PROVTER_EN'], 
                    $row['RCPNT_CLS_EN_DESC'], $row['RCPNT_NML_EN_DESC'], $row['TOT_CY_XPND_AMT']));
                }
                $query_result->free(); #free memory
                return $departments; #return database rows
            }
            $query_result->free(); #free memory
            return false;
        }

        #query database for all finance cases
        public function getFinance(){
            $query_result = $this->connection->query("SELECT * FROM TransferDepartment WHERE DEPT_EN_DESC like 'Finance'");
            $departments = (array) null;

            #if query is not empty
            if ($query_result->num_rows >= 1){
                while ($row = $query_result->fetch_assoc()){ #while query has results
                    array_push($departments, new Department($row['id'], $row['AGRG_PYMT_AMT'], $row['CNTRY_EN_NM'], 
                    $row['CTY_EN_NM'], $row['DEPT_EN_DESC'], $row['DEPARTMENTNUMBER'], 
                    $row['FSCL_YR'], $row['MINC'], $row['MINE'], $row['PROVTER_EN'], 
                    $row['RCPNT_CLS_EN_DESC'], $row['RCPNT_NML_EN_DESC'], $row['TOT_CY_XPND_AMT']));
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
                $query_add = 'INSERT INTO TransferDepartment VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
                $stmt = $this->connection->prepare($query_add);
                $stmt->bind_param('iisssisissssi', $department->getid(),
                                                $department->getPaymentAmount(),
                                                $department->getCountry(),
                                                $department->getCity(),
                                                $department->getDepartmentName(),
                                                $department->getDepartmentNumber(),
                                                $department->getFiscalYear(),
                                                $department->getMinc(),
                                                $department->getMine(),
                                                $department->getProvince(),
                                                $department->getDescription(),
                                                $department->getAddress(),
                                                $department->getTotalCurrentYearAmount());
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