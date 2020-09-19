<?php
    session_start();

     function isLogged($user){
        if(isset($user)){
            return true;
        }else{
            return false;
        }
    }

    function createSession($admin,$doctor,$patient){

        
        if(is_null($admin) && is_null($doctor)){
            
            $_SESSION['current_patient'] = $patient;
            
            redirect('patient');
        
        }else if(is_null($doctor) && is_null($patient)){
            
            $_SESSION['current_admin'] = $admin;
            
            redirect('Admin');

        }else if(is_null($admin) && is_null($patient)){
            
            $_SESSION['current_doctor'] = $doctor;
            redirect('Doctors');
        }
    }
?>