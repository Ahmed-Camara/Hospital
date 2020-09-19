<?php

    class Admin extends Controller{

        public function __construct(){

            if(!isLogged($_SESSION['current_admin']->email)){
                redirect('users/login/admin');
            }
             $this->adminModel = $this->model('Administrator');


             
        }

        public function index(){
            
            $data = [];
            $this->view('admin/index',$data);
        }

        public function dashboard(){
            $numberOfDoctor = $this->adminModel->getNumberofDoctor();
            $numberOfPatients = $this->adminModel->getNumberofPatients();
            $numberOfAppointment = $this->adminModel->getNumberTotalNumberOfAppointments();
            $numberOfMessages = $this->adminModel->getTotalNumberOfReceivedMessages();
            $numberOfDataForPatient = $this->adminModel->getTotalNumberOfDataForPatients();
            $data = [
                'numberOfDoctor' => $numberOfDoctor,
                'numberOfPatients' => $numberOfPatients,
                'numberOfAppointment' => $numberOfAppointment,
                'numberOfMessages' => $numberOfMessages,
                'numberOfDataForPatient' => $numberOfDataForPatient
            ];

            
            $this->view('admin/dashboard',$data);
        }

        public function doctorRecords(){
            $records = $this->adminModel->doctorRecords();
            $this->view('admin/doctorRecord',$records);
        }

        public function messages(){

            $messages = $this->adminModel->messagesRecords();
            $this->view('admin/messages',$messages);
        }

        public function appointment(){

            $appointment = $this->adminModel->appointment();


            $this->view('admin/appointment',$appointment);
        }

        public function patientBooks(){
            $patients = $this->adminModel->patientBooks();
            $this->view('admin/patientsRecords',$patients);
        }

        public function addDoctor(){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'doctorname' => trim($_POST['doctorname']),
                    'doctorspecialisation' => trim($_POST['doctorspecialisation']),
                    'dateofBirth' => trim($_POST['dateofBirth']),
                    'registrationData' => trim($_POST['registrationData']),
                    'email' => trim($_POST['email']),
                    'address' => trim($_POST['address']),
                    'phone_number' => trim($_POST['phone_number']),
                    'gender' => trim($_POST['gender']),
                    'idNumber' => '',
                    'error'=>'',
                    'success'=>'',
                    'email_phone_taken'=>''
                ];

        

                if(empty($data['doctorname']) || empty($data['doctorspecialisation']) ||
                empty($data['dateofBirth']) || empty($data['registrationData']) ||
                    empty($data['email']) || empty($data['address']) || 
                    empty($data['phone_number']) || empty($data['gender'])){
                    
                        $data['error'] = 'Please fill all the forms';
                        
                        
                }else{

                    if(checkExistantEmail($data['email']) || 
                        checkExistantPhoneNumber($data['phone_number'])){
                            $data['email_phone_taken'] = 'email or phone number is already taken';
                            $this->view('admin/addDoctor',$data);
                    }

                    if(empty($data['email_phone_taken']) && empty($data['email_err'])){



                        $data['idNumber'] = generateIdNumber($data['doctorspecialisation']);
                        $password = 'hospital';
                        $password = password_hash($password,PASSWORD_DEFAULT);

                        $saved =  $this->adminModel->addDoctor($data['idNumber'],$data['doctorname']
                            ,$data['doctorspecialisation'],
                            $data['dateofBirth'],$data['registrationData'],$data['email'],
                            $data['address'],$data['phone_number'],$data['gender'],$password);
                        
                        if($saved){
                            $data['success'] = 'Doctor information has been recorded successfully';
                        }else{
                                
                            die('Something went wrong for the registration');
                        }

                        $this->view('admin/addDoctor',$data);

                    }
                }

                $this->view('admin/addDoctor',$data);
                
            }else{

                $data = [
                    'doctorname' => '',
                    'doctorspecialisation' => '',
                    'dateofBirth' => '',
                    'registrationData' => '',
                    'email' => '',
                    'address' => '',
                    'phone_number' => '',
                    'gender' => '',
                    'error' => '',
                    'succes' => '',
                    'email_phone_taken'=>''
                ];
                $this->view('admin/addDoctor',$data);
            }
        }

        public function patientData(){
            $patientData = $this->adminModel->getAllPatientsData();

            $data = [
                'patientData' => $patientData
            ];
            
            $this->view('admin/patientsData',$data);
            
        }

        public function UpdateInformation(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $data = [
                    'new_email' => trim($_POST['new_email']),
                    'new_password' => trim($_POST['new_password']),
                    'new_email_err'=>'',
                    'new_password_err' => '',
                    'success' => '',
                    'error' => ''
                ];


                if(!findEmail($data['new_email'],ADMIN_TABLE)){

                    $data['new_password'] = password_hash($data['new_password']
                    ,PASSWORD_DEFAULT);

                    if($this->adminModel->UpdateInformation($data)){

                        $data['success'] = 'Admin information updated successfully';
                    }else{
                        $data['error'] = 'Fail to update information';
                    }
                }else{
                    $data['new_email_err'] = 'email, already taken';
                }
                $this->view('admin/UpdateInformation',$data);
            }else{

                $data = [
                    'new_email' => '',
                    'new_password' => '',
                    'new_email_err'=>'',
                    'new_password_err' => '',
                    'success' => '',
                    'error' => ''
                ];
                $this->view('admin/UpdateInformation',$data);
            }
            
        }
    }
?>