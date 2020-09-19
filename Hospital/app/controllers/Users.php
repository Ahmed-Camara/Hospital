<?php

    class Users extends Controller{
        public function __construct(){
            $this->usersModel = $this->model('Connection');
            $this->user = '';
        }
        public function index(){
        }

        public function login($users){
            $this->user = $users;
            
            if($this->user === "admin"){
                
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    
                    $this->logUserIng(ADMIN_TABLE);
                }else{
                    $this->loadUserLoginViews();
                }
            }else if($this->user === 'doctors'){
                
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    $this->logUserIng(DOCTOR_TABLE);
                }else{
                    $this->loadUserLoginViews();
                }
            }else if($this->user === 'patient'){

                
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    $this->logUserIng(PATIENT_TABLE);
                }else{
                    $this->loadUserLoginViews();
                }
            }
        }

        private function logUserIng($tableName){

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            if(empty($data['email']) && empty($data['password'])){
            
                $data['email_err'] = 'Please,Enter email';
                $data['password_err'] = 'Please,Enter password';
                $this->view($this->user.'/login',$data);
            }

            
            if(!checkExistantEmail($data['email'],$tableName)){
                    
                $data['email_err'] = 'email not found';
                
            }

            if(empty($data['email_err']) && empty($data['password_err'])){
                
                $isLogged = $this->usersModel->login($data['email'],$data['password'],
                            $tableName);

                
                if($isLogged){ 
                    
                    if($tableName === 'patients') createSession(null,null,$isLogged);
                    else if($tableName === 'admin') createSession($isLogged,null,null);
                    else if($tableName === 'doctors') createSession(null,$isLogged,null);
                   
                }else{
                        
                    $data['password_err'] = 'Incorrect password';
                    
                    $this->view($this->user.'/login',$data);
                }
            }else{
                $this->view($this->user.'/login',$data);
            }

        }

        private function loadUserLoginViews(){
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            $this->view($this->user.'/login',$data);
        }


        public function forgotPassword($users){
            
            $this->user = $users;
            
            if($this->user === "admin"){

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    $this->changeUserPassword(ADMIN_TABLE);
                }else{

                    $this->loadForgotPasswordViews();
                }



            }else if($this->user === "doctors"){

                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    
                    $this->changeUserPassword(DOCTOR_TABLE);
                }else{
                 
                    $this->loadForgotPasswordViews();
                }
            }else if($this->user === 'patient'){

                
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    
                    $this->changeUserPassword(PATIENT_TABLE);
                }else{
                 
                    $this->loadForgotPasswordViews();
                }
            }
        }

        private function changeUserPassword($tableName){

            
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['new_password']),
                'success' => '',
                'email_error' => ''
            ];

            if(!checkExistantEmail($data['email'],$tableName)){

                $data['email_error'] = 'email not found in the system';
                $this->view($this->user.'/forgotPassword',$data);
            }

            if(empty($data['email_error'])){

                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                if($this->usersModel->changePassword($data,$tableName)){

                    $data['success'] = 'Pasword has been changed successfuly';
                }else{
                    die('something went wrong');
                }
            }

            $this->view($this->user.'/forgotPassword',$data);
        }

        private function loadForgotPasswordViews(){

            $data = [

                'email' => '',
                'password' => '',
                'success' => '',
                'success' => '',
                'email_error' => ''
            ];
            $this->view($this->user.'/forgotPassword',$data);

        }

        public function registration(){

            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'id' => '',
                    'firstName' => trim($_POST['firstName']),
                    'lastName' => trim($_POST['lastName']),
                    'permanent_address' => trim($_POST['permanent_address']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'phone_number' => trim($_POST['phone_number']),
                    'dateOfBirth' => trim($_POST['dateOfBirth']),
                    'blood_group' => trim($_POST['blood_group']),
                    'email_err' => '',
                    'phone_number_err' => '',
                    'success_message' => ''
                ];


                if(checkExistantEmail($data['email'])){
                    $data['email_err'] = 'email is already taken';
                }
                if(checkExistantPhoneNumber($data['phone_number'])){
                    $data['phone_number_err'] = 'Phone Number is already taken';
                }

                if(empty($data['email_err']) && empty($data['phone_number_err'])){

                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                    $data['id'] = generateIdNumber($data['firstName']);

                    if($this->usersModel->createAccount($data)){
                        $data['email_err'] = $data['phone_number_err'] = '';
                        $data['success_message'] = 'Created successfully';
                        $this->view('patient/registration',$data); 
                    }else{
                        die('something went wrong');
                    }
                }else{
                    $this->view('patient/registration',$data); 
                } 

                
            }else{
                $data = [
                    'id' => '',
                    'firstName' => '',
                    'lastName' => '',
                    'permanent_address' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'phone_number' => '',
                    'dateOfBirth' => '',
                    'blood_group' => '',
                    'success' => '',
                    'firstName_err' => '',
                    'lastName_err' => '',
                    'permanent_address_err' => '',
                    'email_err' => '',
                    'phone_number_err' => '',
                    'dateOfBirth_err' => '',
                    'blood_group_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

               
                $this->view('patient/registration',$data);
            }
        }

        public function logout(){

            session_destroy();
            redirect('home');
        }
    }
?>