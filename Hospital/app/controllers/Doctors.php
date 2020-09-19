<?php
    class Doctors extends Controller{

        public function __construct(){
            
            if(!isLogged($_SESSION['current_doctor']->email)){
                redirect('users/login/doctors');
            }
             $this->doctorModel = $this->model('Doctor');
        }

        public function index(){
            
            $data = [];

            $this->view('doctors/index',$data);
        }

        public function dashboard(){

            $numberOfRepliedApp = 
                 $this->doctorModel->getNumberOfRepliedAppointment($_SESSION['current_doctor']->id) ;

            $numberOfAppointment = 
                 $this->doctorModel->getNumberOfAppointment($_SESSION['current_doctor']->specialisation);
            $data = [
                'numberOfRepliedApp' => $numberOfRepliedApp,
                'numberOfAppointment' => $numberOfAppointment
            ];

            $this->view('doctors/dashboard',$data);
        }


        public function profil(){
            $profil =  $this->doctorModel->getSpecificDoctor($_SESSION['current_doctor']->id);
             $this->view('doctors/profil',$profil);
         }

         public function appointment(){
            
            $appointment = $this->doctorModel->getSpecificAppointment($_SESSION['current_doctor']->specialisation);

            $this->view('doctors/appointment',$appointment);
        }

        public function repliedAppointment(){
            $repliedAppointment = 
                $this->doctorModel->AppointmentAccepted($_SESSION['current_doctor']->specialisation);

            $this->view('doctors/repliedAppointment',$repliedAppointment);
        }

        public function acceptAppoint($patient_id,$date,$time){
           
           $data = [
               'doctor_id' => trim($_SESSION['current_doctor']->id),
               'doctor_name' => trim($_SESSION['current_doctor']->name),
               'doctor_email' => trim($_SESSION['current_doctor']->email),
               'doctor_phone' => trim($_SESSION['current_doctor']->phone),
               'specialisation' => trim($_SESSION['current_doctor']->specialisation),
               'patient_id' => $patient_id,
               'app_date' => $date,
               'app_time' => $time
           ];

            if($this->doctorModel->AcceptAppointment($data)){
                redirect('doctors/appointment');
            }else{
                die('something went wrong');
            }
        }


        public function updateProfile(){

            
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_SESSION['current_doctor']->id),
                    'permanentAddress'=>trim($_POST['permanentAddress']),
                    'email' => trim($_POST['email']),
                    'phone_number'=>trim($_POST['phone_number']),
                    'new_password' => trim($_POST['new_password']),
                    'confirm_new_password' => trim($_POST['confirm_new_password']),
                    'success' => '',
                    'email_err' => '',
                    'phone_number_err' => ''
                ];


                if(checkExistantEmail($data['email'])){
                    $data['email_err'] = 'Email already taken';
                }


                if(checkExistantPhoneNumber($data['phone_number'])){
                    $data['phone_number_err'] = 'Phone number already taken';
                }
                
                if(empty($data['email_err']) && empty($data['phone_number_err'])){

                    $data['new_password'] = password_hash($data['new_password'],PASSWORD_DEFAULT);


                    if($this->doctorModel->updateProfil($data)){
                        $data['success'] = 'Information updated successfully';
                        $this->updateSession($data);
                        $this->view('doctors/updateProfile',$data);
                    }
                }else{
                    $this->view('doctors/updateProfile',$data);
                }
                
            }else{

                $data = [
                    'id'=>'',
                    'permanentAddress'=>'',
                    'email' => '',
                    'phone_number'=>'',
                    'new_password' => '',
                    'confirm_new_password' => '',
                    'success' => '',
                    'email_err' => '',
                    'phone_number_err' => ''
                ];

                $this->view('doctors/updateProfile',$data);
            }
        }

        private function updateSession($data){

            $_SESSION['current_doctor']->address = $data['permanentAddress'];
            $_SESSION['current_doctor']->email = $data['email'];
            $_SESSION['current_doctor']->phone = $data['phone_number'];
            $_SESSION['current_doctor']->password = $data['new_password'];
           
        }

       public function setPatientData(){

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                $data = [
                    'patientID' => trim($_POST['patientID']),
                    'patientName' => trim($_POST['patientName']),
                    'date' => trim($_POST['date']),
                    'details' => trim($_POST['details']),
                    'prescription' => trim($_POST['prescription']),
                    'doctorID' => trim($_SESSION['current_doctor']->id),
                    'doctorName' => trim($_SESSION['current_doctor']->name),
                    'doctorEmail' => trim($_SESSION['current_doctor']->email),
                    'doctorPhone' => trim($_SESSION['current_doctor']->phone),
                    'cost' => trim($_POST['cost']),
                    'patientID_err' => '',
                    'success' => '',
                    'error' => ''

                    
                ];

                if(empty($data['patientID']) || empty($data['patientName']) ||
                        empty($data['date']) || empty($data['details']) ||
                        empty($data['prescription']) || empty($data['cost'])){

                        $data['error'] = 'please fill the forms';
                        
                }else{

                    if(!$this->doctorModel->findPatientID($data['patientID'])){
                        $data['patientID_err'] = 'Invalid patient ID';
                       // $this->view('doctors/patientData',$data);
                    }else{

                        $data['cost'] = $data['cost'].' TK';
                        if($this->doctorModel->savePatientData($data)){
                            $data['success'] = 'Patient Data Prescription set successfully';
                        }
                    }
                }

                $this->view('doctors/patientData',$data);
            }else{
                $data = [
                    'patientID' => '',
                    'patientName' => '',
                    'date' => '',
                    'details' => '',
                    'prescription' => '',
                    'patientID_err' => '',
                    'cost'=>'',
                    'success' => '',
                    'error' => ''
                ];

                $this->view('doctors/patientData',$data);
            }
       }
    }
?>