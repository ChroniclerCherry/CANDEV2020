<?php
    #class written by Ronald Tavarez for CANDEV 2020
    #employee object class for querying department table from mysql database
    class Department extends Connection{

        #private fields
        private $id; #department name
        private $paymentAmount; 
        private $country;
        private $city;
        private $departmentName;
        private $departmentNumber;
        private $fiscalYear;
        private $minc;
        private $mine;
        private $province;
        private $description;
        private $address;
        private $totalCurrentYearAmount;

        #GETTERS
        public function getid(){
            return $this->id;
        }

        public function getPaymentAmount(){
            return $this->paymentAmount;
        }

        public function getCountry(){
            return $this->country;
        }
        
        public function getCity(){
            return $this->city;
        }
        
        public function getDepartmentName(){
            return $this->departmentName;
        }
        
        public function getDepartmentNumber(){
            return $this->departmentNumber;
        }
        
        public function getFiscalYear(){
            return $this->fiscalYear;
        }
        
        public function getMinc(){
            return $this->minc;
        }
        
        public function getMine(){
            return $this->mine;
        }
        
        public function getProvince(){
            return $this->province;
        }

        public function getDescription(){
            return $this->description;
        }

        public function getAddress(){
            return $this->address;
        }

        public function getTotalCurrentYearAmount(){
            return $this->totalCurrentYearAmount;
        }

        #CONSTRUCTOR
        public function __construct($id, $paymentAmount, $country, $city, $departmentName, $departmentNumber, $fiscalYear, $minc, $mine, $province,
                                    $description, $address, $totalCurrentYearAmount){
            $this->id = $id;
            $this->paymentAmount = $paymentAmount;
            $this->country = $country;
            $this->city = $city;
            $this->departmentName = $departmentName;
            $this->departmentNumber = $departmentNumber;
            $this->fiscalYear = $fiscalYear;
            $this->minc = $minc;
            $this->mine = $mine;
            $this->province = $province;
            $this->description = $description;
            $this->address = $address;
            $this->totalCurrentYearAmount = $totalCurrentYearAmount;
        }

        
    }
?>