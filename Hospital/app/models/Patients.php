<?php
    class Patients{

        private $db;
        public function __construct(){
            $this->db = new Database;
        }
        public function patientsRecords($id){

            $this->db->query('SELECT * FROM patients WHERE id = :id');

            $this->db->bind(':id',$id);

            $row = $this->db->single();

            if($row){
                return $row;
            }else{
                return false;
            }

        }
        /* public function findPassword($password,$id){
            $this->db->query('SELECT *FROM patients WHERE id = :id');

            $this->db->bind(':id',$id);

            $data = $this->db->single();

            $hashed_password = $data->password;

            if(password_verify($password,$hashed_password)){
                return true;
            }else{
                return false;
            }
        } */

        public function updateProfil($data){


            $this->db->query('UPDATE
            patients SET permanentAddress = :permanentAddress,
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

        public function sentAppointment($data){

            $this->db->query('SELECT *FROM appointment_user WHERE patient_id = :id');
            $this->db->bind(':id',$data['id']);

            $row = $this->db->single();

            if($this->db->rowCounts() > 0){

                if($this->saveAppointmentDetails($data)){
                    return true;
                }else{
                    return false;
                }
            
            }else{

                $this->db->query('INSERT INTO appointment_user
                VALUES(:patient_id,:patient_name,:email,:phone)');

                $this->db->bind(':patient_id',$data['id']);
                $this->db->bind(':patient_name',$data['name']);
                $this->db->bind(':email',$data['email']);
                $this->db->bind(':phone',$data['phone']);

                if($this->db->execute() && $this->saveAppointmentDetails($data)){
                    return true;
                }else{
                    return false;
                }

            }
        }

        private function saveAppointmentDetails($data){

                $this->db->query('INSERT INTO
                appointment(patient_id,
                doctor_specialization,Appointment_date,Appointment_time,status)
                VALUES (:patient_id,:doctor_specialization,
                :appointment_date,:appointment_time,:status)');
                
                $this->db->bind(':patient_id',$data['id']);
                $this->db->bind(':doctor_specialization',$data['specialisation']);
                $this->db->bind(':appointment_date',$data['bookingDate']);
                $this->db->bind(':appointment_time',$data['bookingTime']);
                $this->db->bind(':status',$data['status']);

                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
        }
        public function getAppointments($id){
            
            $this->db->query('SELECT appointment_user.patient_id,
            appointment.doctor_id,appointment.doctor_name,appointment.doctor_email,
            appointment.doctor_phone,appointment.doctor_specialization,
            appointment.Appointment_date,appointment.Appointment_time,
            appointment.status
            FROM appointment_user,appointment
            WHERE appointment_user.patient_id = appointment.patient_id
            AND appointment.patient_id = :id');

            $this->db->bind(':id',$id);

            $records = $this->db->resultSet();

            if($records){
                return $records;
            }else{
                return false;
            }
        }

        public function getDoctorsSpecialization(){
            $this->db->query('SELECT DISTINCT specialisation FROM doctors');

            $records = $this->db->resultSet();

            return $records;
        }

        public function getPatientData($id){
            
            
            $this->db->query('SELECT * FROM patient_data WHERE patient_id = :id');

            $this->db->bind(':id',$id);
            
            $data = $this->db->resultSet();

            if($data){
                return $data;
            }else{
                return false;
            }
        }
        
    }
?>