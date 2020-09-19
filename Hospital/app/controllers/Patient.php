<?php
    
    class Patient extends Controller{

        public function __construct(){

            if(!isLogged($_SESSION['current_patient']->email)){
                redirect('users/login/patient');
            }

            $this->patientModel = $this->model('Patients');
            $this->record = $this->model('Administrator');
            
            
        }

        public function index(){
            $data =[];
            
            $this->view('patient/dashboard',$data);
        }

        public function AppointmentHistory(){

            $appointments = 
                $this->patientModel->getAppointments($_SESSION['current_patient']->id);
            
                $data = [
                    'appointments' => $appointments
                ];
                
                $this->view('patient/appointmentHistory',$data); 
        }

        public function bookAppointment(){

            $records = $this->patientModel->getDoctorsSpecialization();

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                
                $data = [

                    'specialisation' => trim($_POST['specialisation']),
                    'bookingDate' => trim($_POST['bookingDate']),
                    'bookingTime' => trim($_POST['bookingTime']),
                    'email' => $_SESSION['current_patient']->email,
                    'id' => $_SESSION['current_patient']->id,
                    'name' => $_SESSION['current_patient']->firstName,
                    'phone' => $_SESSION['current_patient']->phone,
                    'status' => 'PENDING',
                    'records' => $records,
                    'success' => '',
                    'error' => ''
                ];

                if(empty($data['specialisation']) || empty($data['bookingDate']) ||
                    empty($data['bookingTime'])){
                    
                    $data['error'] = 'Please fill all the forms';
                    
                }else{
                    
                    if($this->patientModel->sentAppointment($data)){

                        $data['success'] = 'Appointment saved successfully';
                    }else{
                        $data['error'] = 'Something went wrong';
                    }
                }
                $this->view('patient/booking',$data);

            }else{

                    $data = [
                        'specialisation' => '',
                        'bookingDate' => '',
                        'bookingTime' => '',
                        'email' => '',
                        'id' => '',
                        'name' => '',
                        'phone' => '',
                        'status' => '',
                        'records' => $records,
                        'success' => '',
                        'error' => ''
                    ];
                    $this->view('patient/booking',$data);
                
            }
        }

        public function dashboard(){
            
            $data = [];

            $this->view('patient/dashboard',$data);
        }

        public function profil(){

            $data = [
                'id' => trim($_SESSION['current_patient']->id),
                'firstName' => trim($_SESSION['current_patient']->firstName),
                'lastName' => trim($_SESSION['current_patient']->lastName),
                'permanentAddress'=>trim($_SESSION['current_patient']->permanentAddress),
                'email'=>trim($_SESSION['current_patient']->email),
                'phone'=>trim($_SESSION['current_patient']->phone),
                'DOB' => trim($_SESSION['current_patient']->dateOfBirth),
                'blood_group'=>trim($_SESSION['current_patient']->bloodGroup)
            ];

            $this->view('patient/profil',$data);
        }

        public function updateProfil(){

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'id' => trim($_SESSION['current_patient']->id),
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


                    if($this->patientModel->updateProfil($data)){
                        $data['success'] = 'Information updated successfully';
                        $this->updateSession($data);
                        $this->view('patient/updateProfil',$data);
                    }
                }else{
                    $this->view('patient/updateProfil',$data);
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

                $this->view('patient/updateProfil',$data);
            }
        }

        private function updateSession($data){

            $_SESSION['current_patient']->permanentAddress = $data['permanentAddress'];
            $_SESSION['current_patient']->email = $data['email'];
            $_SESSION['current_patient']->phone = $data['phone_number'];
            $_SESSION['current_patient']->password = $data['new_password'];
           
        }

        public function patientData(){
            $patientData = $this->patientModel->getPatientData($_SESSION['current_patient']->id);

            if($patientData){
                $this->view('patient/patientData',$patientData);
            }else{
                $data = [];
                $this->view('patient/patientData',$data);
            }
            
        }

        public function printPdfFile($patient_id,$doctor_name,$doctor_email,
            $doctor_id,$date,$details,$prescription,$cost){

            

            require('fpdf182/fpdf.php');

            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->setFont('Arial','B',16);
            $pdf->Cell(100,5,'Patient ID: ',0,0,'C');
            $pdf->Cell(90,5,$patient_id,0,1);

            
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(55,5,'Doctor Name : ',0,0);
            $pdf->Cell(58,5,$doctor_name,0,0);
            $pdf->Cell(25,5,'Date : ',0,0);
            $pdf->Cell(52,5,$date,0,1);
            $pdf->Cell(190,5,'',0,1);
             $pdf->Cell(55,5,'Doctor Email : ',0,0);
            $pdf->Cell(58,5,$doctor_email,0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(55,5,'Doctor ID : ',0,0);
            $pdf->Cell(58,5,$doctor_id,0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(55,5,'Details : ',0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,$details,0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,'Prescription : ',0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,$prescription,0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(190,5,'',0,1);
            $pdf->Cell(55,5,'Cost : ',0,0);
            $pdf->Cell(58,5,$cost,0,1);

            $pdf->Output();
        }
    }
?>