<?php
    #class written by Ronald Tavarez for CANDEV 2020
    #employee object class for querying department table from mysql database
    class Department extends Connection{

        #private fields
        private $department; #department name
        private $department_code; 
        private $program_stream_name;
        private $nom_du_volet_de_programme = null; #french duplicate
        private $sub_program_stream_name;
        private $nom_du_volet_de_sous_programme = null; #french duplicate
        private $transfer_payment_program;
        private $program_de_paiment_de_transfer = null; #french duplicate
        private $drf_program;
        private $program_code;
        private $program_stream_id;
        private $intermediaries;
        private $named_recipient;

        #SO MANY GETTERS AND SETTERS REEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEES
        public function getDepartment(){
            return $this->department;
        }

        public function setDepartment($department){
            $this->department = $department;
        }

        public function getDepartmentCode(){
            return $this->department_code;
        }

        public function setDepartmentCode($department_code){
            $this->department_code = $department_code;
        }
        
        public function getProgramStreamName(){
            return $this->program_stream_name;
        }

        public function setProgramStreamName($program_stream_name){
            $this->program_stream_name = $program_stream_name;
        }
        
        public function getSubProgramStreamName(){
            return $this->sub_program_stream_name;
        }

        public function setSubProgramStreamName($sub_program_stream_name){
            $this->sub_program_stream_name = $sub_program_stream_name;
        }
        
        public function getTransferPaymentProgram(){
            return $this->transfer_payment_program;
        }

        public function setTransferPaymentProgram($transfer_payment_program){
            $this->transfer_payment_program = $transfer_payment_program;
        }
        
        public function getDRFProgram(){
            return $this->drf_program;
        }

        public function setDRFProgram($drf_program){
            $this->drf_program = $drf_program;
        }
        
        public function getProgramCode(){
            return $this->program_code;
        }

        public function setProgramCode($program_code){
            $this->program_code = $program_code;
        }
        
        public function getProgramStreamId(){
            return $this->program_stream_id;
        }

        public function setProgramStreamId($program_stream_id){
            $this->program_stream_id = $program_stream_id;
        }
        
        public function getIntermediaries(){
            return $this->intermediaries;
        }

        public function setIntermediaries($intermediaries){
            $this->intermediaries = $intermediaries;
        }
        
        public function getNamedRecipient(){
            return $this->named_recipient;
        }

        public function setNameRecipient($named_recipient){
            $this->named_recipient = $named_recipient;
        }

        #WORLDS LONGEST CONSTRUCTOR REEEEEE
        public function __construct($department, $department_code, $program_stream_name, $sub_program_stream_name,
                                    $transfer_payment_program, $drf_program, $program_code, $program_stream_id, $intermediaries, $named_recipient){
            $this->setDepartment($department);
            $this->setDepartmentCode($department_code);
            $this->setProgramStreamName($program_stream_name);
            $this->setSubProgramStreamName($sub_program_stream_name);
            $this->setTransferPaymentProgram($transfer_payment_program);
            $this->setDRFProgram($drf_program);
            $this->setProgramCode($program_code);
            $this->setProgramStreamId($program_stream_id);
            $this->setIntermediaries($intermediaries);
            $this->setNameRecipient($named_recipient);
        }

        
    }
?>