<?php
    class Employee{
        private $db;
        private $db_table = "Employee";
        public $id;
        public $name;
        public $email;
        public $designation;
        public $created;
        public $result;
        public function __construct($db){
            $this->db = $db;
        }

        public function getEmployees(){
            $sqlQuery = "SELECT id, name, email, designation, created FROM " . $this->db_table . "";
            $this->result = $this->db->query($sqlQuery);
            return $this->result;
        }
    }
?>