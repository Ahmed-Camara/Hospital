<?php
    class Administrator{

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function addDoctor($doctorId,$doctorname,$doctorSpecialisation,$dataOfBirth,
                                    $registrationdate,$email,$address,$phone,$gender,$password){
            
            $this->db->query('INSERT INTO doctors VALUES(:doctorId,:doctorname,:doctorSpecialisation,
            :dataOfBirth,:registrationdate,:email,:address,:phone, :gender,:password)');

            $this->db->bind(':doctorId',$doctorId);
            $this->db->bind(':doctorname',$doctorname);
            $this->db->bind(':doctorSpecialisation',$doctorSpecialisation);
            $this->db->bind(':dataOfBirth',$dataOfBirth);
            $this->db->bind(':registrationdate',$registrationdate);
            $this->db->bind(':email',$email);
            $this->db->bind(':address',$address);
            $this->db->bind(':phone',$phone);
            $this->db->bind(':gender',$gender);
            $this->db->bind(':password',$password);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }

        public function getNumberofDoctor(){
            $this->db->query('SELECT * FROM doctors');
            $this->db->execute();
           $row = $this->db->rowCounts();
          return $row;
       }

       public function getNumberofPatients(){
            $this->db->query('SELECT * FROM patients');
            $this->db->execute();
            $row = $this->db->rowCounts();
            return $row;
        }

        public function getNumberTotalNumberOfAppointments(){
            $this->db->query('SELECT * FROM appointment');
            $this->db->execute();
            $row = $this->db->rowCounts();
            return $row;
        }


        public function getTotalNumberOfReceivedMessages(){
            $this->db->query('SELECT * FROM contactus');
            $this->db->execute();
            $row = $this->db->rowCounts();
            return $row;
        }

        public function getTotalNumberOfDataForPatients(){

            $this->db->query('SELECT * FROM patient_data');
            $this->db->execute();
            $row = $this->db->rowCounts();
            return $row;
        }

        public function findByEmail($email){

            $this->db->query('SELECT *FROM doctors WHERE email = :email');

            $this->db->bind(':email',$email);


            $row = $this->db->single();


            if($this->db->rowCounts() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function findByPhoneNumber($phone){
            $this->db->query('SELECT *FROM doctors WHERE phone = :phone');

            $this->db->bind(':phone',$phone);


            $row = $this->db->single();


            if($this->db->rowCounts() > 0){
                return true;
            }else{
                return false;
            }
        }

        
        public function doctorRecords(){
            $this->db->query('SELECT * FROM doctors');

            $records = $this->db->resultSet();

            return $records;
        }

        public function getAllPatientsData(){
            $this->db->query('SELECT * FROM patient_data');

            $records = $this->db->resultSet();

            return $records;
        }

        public function messagesRecords(){
            $this->db->query('SELECT * FROM contactus');

            $records = $this->db->resultSet();

            return $records;
        }

        public function patientsRecords(){
            $this->db->query('SELECT * FROM patients');

            $records = $this->db->resultSet();

            return $records;
        }

        public function patientBooks(){
            $this->db->query('SELECT *FROM patients');

            $patientBooks = $this->db->resultSet();

            return $patientBooks;
        }

        public function appointment(){
            $this->db->query('SELECT * FROM appointment, appointment_user 
            WHERE appointment.patient_id = appointment_user.patient_id');

            return $this->db->resultSet();
        }


        public function UpdateInformation($data){


            $this->db->query('UPDATE admin SET email = :email, password = :password');

            $this->db->bind(':email',$data['new_email']);
            $this->db->bind(':password',$data['new_password']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        
    }
?>