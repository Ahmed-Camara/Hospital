<?php 

    class Connection{

        private $db;

        public function __construct(){
            $this->db = new Database;
        }
        
        /* PATIENT FUNCTION */

        public function createAccount($data){
            
            $this->db->query('INSERT INTO patients VALUES(:id,:firstName,:lastName,
            :permanentAddress,:email,:phone,:dateOfBirth,:bloodGroup,:password)');

            $this->db->bind(':id',$data['id']);
            $this->db->bind(':firstName',$data['firstName']);
            $this->db->bind(':lastName',$data['lastName']);
            $this->db->bind(':permanentAddress',$data['permanent_address']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':phone',$data['phone_number']);
            $this->db->bind(':dateOfBirth',$data['dateOfBirth']);
            $this->db->bind(':bloodGroup',$data['blood_group']);
            $this->db->bind(':password',$data['password']);
            
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }
        
        public function login($email,$password,$tableName){

            $this->db->query('SELECT * FROM '.$tableName.' WHERE email = :email');
            $this->db->bind(':email',$email);

            $row = $this->db->single();

            if($row){
                $hashed_password = $row->password; 
            
                if(password_verify($password,$hashed_password)){
                    return $row;
                }else{
                return false;
                }
            }

            return false;
        }

        public function changePassword($data,$tableName){

            $this->db->query('UPDATE '.$tableName.' SET password = :password
                    WHERE email = :email');

            $this->db->bind(':password',$data['password']);
            $this->db->bind(':email',$data['email']);
            

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function sendMessage($data){
            


            $this->db->query('INSERT INTO contactUS 
            (email,name,phone,patient_id,message_body) 
            VALUES(:email,:name,:phone,:patient_id,:message_body)');


            $this->db->bind(':email',$data['email']);
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':phone',$data['phone']);
            $this->db->bind(':patient_id',$data['id']);
            $this->db->bind(':message_body',$data['message']);


            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }
    }
?>