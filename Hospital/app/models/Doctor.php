<?php
    class Doctor{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getPatients(){

            $this->db->query('SELECT *FROM patients');
            
            return $this->db->resultSet();
        }

        public function getSpecificAppointment($speci){
            $query = $this->return_query();
            
            $this->db->query($query);

            $this->db->bind(':speci',$speci);

            $this->db->bind(':status','PENDING');

            $app = $this->db->resultSet();

            return $app;
        }

        public function getNumberOfAppointment($speci){
            $query = $this->return_query();

            $this->db->query($query);

            $this->db->bind(':speci',$speci);

            $this->db->bind(':status','PENDING');

            $this->db->execute();
            $row = $this->db->rowCounts();
            return $row;
        }

        public function getNumberOfRepliedAppointment($doctorId){
            $this->db->query('SELECT * FROM appointment,appointment_user 
            WHERE appointment.patient_id = appointment_user.patient_id
            AND appointment.doctor_id = :id
            AND appointment.status = :status');


            $this->db->bind(':id',$doctorId);
            $this->db->bind(':status','ACCEPTED');
            $this->db->execute();
            $row = $this->db->rowCounts();
            return $row;
        }
        public function AcceptAppointment($data){

           

            $this->db->query('UPDATE appointment
                SET doctor_id = :doctor_id,doctor_name = :doctor_name,
                doctor_email = :doctor_email,doctor_phone = :doctor_phone,
                status = :status WHERE patient_id = :patient_id
                AND doctor_specialization = :doctorSpeci AND Appointment_date = :date
                AND Appointment_time = :time');

            $this->db->bind(':doctor_id',$data['doctor_id']);
            $this->db->bind(':doctor_name',$data['doctor_name']);
            $this->db->bind(':doctor_email',$data['doctor_email']);
            $this->db->bind(':doctor_phone',$data['doctor_phone']);
            $this->db->bind(':status','ACCEPTED');

            $this->db->bind(':patient_id',$data['patient_id']);
            $this->db->bind(':doctorSpeci',$data['specialisation']);
            $this->db->bind(':date',$data['app_date']);
            $this->db->bind(':time',$data['app_time']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        public function AppointmentAccepted($speci){
            $query = $this->return_query();
            
            $this->db->query($query);

            $this->db->bind(':speci',$speci);

            $this->db->bind(':status','ACCEPTED');

            return $this->db->resultSet();
        } 

        private function return_query(){

            $query = 'SELECT * FROM appointment,appointment_user 
            WHERE appointment.patient_id = appointment_user.patient_id
            AND doctor_specialization = :speci AND status = :status';
            return $query;
        }

        public function getSpecificDoctor($id){

            $this->db->query('SELECT * FROM doctors WHERE id = :id');

            $this->db->bind(':id',$id);

            return $this->db->single();
        }

        public function savePatientData($data){

            $this->db->query('INSERT INTO 
                patient_data(patient_id,patient_name,doctor_id,doctor_name,doctor_email,
                doctor_phone,date,
                details,prescription,cost) 
                VALUES(:patient_id,:patient_name,:doctor_id,:doctor_name,:doctor_email,
                :doctor_phone,
                :date,:details,:prescription,:cost)');

            $this->db->bind(':patient_id',$data['patientID']);
            $this->db->bind(':patient_name', $data['patientName']);
            $this->db->bind(':doctor_id', $data['doctorID']);
            $this->db->bind(':doctor_name', $data['doctorName']);
            $this->db->bind(':doctor_email', $data['doctorEmail']);
            $this->db->bind(':doctor_phone', $data['doctorPhone']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':details', $data['details']);
            $this->db->bind(':prescription', $data['prescription']);
            $this->db->bind(':cost', $data['cost']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function updateProfil($data){


            $this->db->query('UPDATE
            doctors SET address = :permanentAddress,
                        email = :email,
                        phone = :phone_number,
                        password = :password WHERE id = :id');

            $this->db->bind(':permanentAddress',$data['permanentAddress']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':phone_number',$data['phone_number']);
            $this->db->bind(':password',$data['new_password']);

            $this->db->bind(':id',$data['id']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function findPatientID($id){

            $this->db->query('SELECT * FROM patients WHERE id = :id');
            $this->db->bind(':id',$id);

            $row = $this->db->single();


            if($this->db->rowCounts() > 0){
                return true;
            }else{
                return false;
            }
        }
        
    }
?>