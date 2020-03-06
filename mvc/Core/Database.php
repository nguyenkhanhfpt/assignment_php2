<?php
    class Database {
        public $con;
        protected $nameServer = 'localhost';
        protected $userName = 'root';
        protected $pass = '';
        protected $nameDB = 'assignmentphp2';

        public function __construct()
        {
            try{
                $this->con = new PDO("mysql:host=" .$this->nameServer. ";dbname=" .$this->nameDB. ";charset=utf8", $this->userName , $this->pass);
            }
            catch(PDOException $e){
                echo 'Some - Error';
            }
        }

        public function pdo_execute($sql) {
            $arrParams = array_slice(func_get_args(), 1);
            $stmt = $this->con->prepare($sql);
            $stmt->execute($arrParams);
        }

        public function pdo_query($sql) {
            $arrParams = array_slice(func_get_args(), 1);
            $stmt = $this->con->prepare($sql);
            $stmt->execute($arrParams);
            $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datas;
        }

        public function pdo_query_one($sql) {
            $arrParams = array_slice(func_get_args(), 1);
            $stmt = $this->con->prepare($sql);
            $stmt->execute($arrParams);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }
?>