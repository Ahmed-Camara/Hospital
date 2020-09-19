<?php
    class Database{
        
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;
        private $dbh;
        private $stm;
        private $error;

        public function __construct(){
            try{
                $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
                $options = array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                  );
                $this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }


        public function query($sql){
            $this->stm = $this->dbh->prepare($sql);
        }

        public function bind($param,$value,$type = null){
            
            if(is_null($type)){
                switch(true){
                  case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                  case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                  case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                  default:
                    $type = PDO::PARAM_STR;
                }
              }
        
              $this->stm->bindValue($param, $value, $type);
        }

        public function execute(){
            return $this->stm->execute();
        }

        public function resultSet(){
            $this->execute();
            return $this->stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function single(){
            $this->execute();
            return $this->stm->fetch(PDO::FETCH_OBJ);

        }
        public function rowCounts(){
            return $this->stm->rowCount();
        }
    }
?>