<?php

    class Home extends Controller{

        public function __construct(){
            $this->usersModel = $this->model('Connection');
        }

        public function index(){
            
            $data = [];
            $this->view('home/index',$data);
        }

        public function about(){
            
            $data = [];
            $this->view('home/about',$data);

        }

        public function contactUs(){

            
            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                $data = [
                    'email'=>trim($_POST['email']),
                    'name' => trim($_POST['name']),
                    'phone' => trim($_POST['phone']),
                    'id' => trim($_POST['id']),
                    'message' => trim($_POST['message']),
                    'success' => '',
                    'error' => ''
                ];

                if(!empty($data['email']) && !empty($data['name']) && !empty($data['phone']) &&
                    !empty($data['id']) && !empty($data['message'])){
                    
                        if($this->usersModel->sendMessage($data)){
                            $data['success'] = 'Your message has been sent';
                            
                            
                        }else{
                            die('something went wrong');
                        }

                    $this->view('home/contact',$data);
                }else{
                    $data['error'] = 'Please fill the whole form';
                    $this->view('home/contact',$data);
                }
            }else{
                $data = [
                    'email'=>'',
                    'name' => '',
                    'phone' => '',
                    'id' => '',
                    'message' => ''
                ];
                $this->view('home/contact',$data);
            }
        }
    }
?>