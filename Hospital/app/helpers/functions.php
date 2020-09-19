<?php



    function findPassword($password,$tableName){

        $db = new Database();

        $db->query('SELECT *FROM '.$tableName.' WHERE email = :email');
        $db->bind(':email',$email);

        $row = $db->single();

        if($db->rowCounts() > 0){
            
            return true;
        }else{
            return false;
        }
    }
     

    function generateIdNumber($specialisation){
        
        $first = substr($specialisation,0,4);
        $num = rand(1000,9999);
        $id = $first.'-'.$num;

        return $id;
    }

    function changeCredentials($email,$password,$oldEmail,$tableName){
        $db = new Database();
        
        if(is_null($oldEmail)){
            $db->query('UPDATE '.$tableName.' SET password = :password
            WHERE email = :email');

            $db->bind(':password',$password);
            $db->bind(':email',$email);
            
            if($db->execute()){
                return true;
            }else{
                return false;
            }
        }else{
            $db->query(
                'UPDATE '.$tableName.' SET email = :email,password = :password
                WHERE email = :oldEmail'
            );
            $db->bind(':email',$email);
            $db->bind(':password',$password);
            $db->bind(':oldEmail',$oldEmail);
            
            if($db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

    function findEmailPatient($email){

        $db = new Database();

        $db->query('SELECT *FROM patients WHERE email = :email');
        $db->bind(':email',$email);

        $row = $db->single();

        
        if($db->rowCounts() > 0){
            
            return true;
        }else{
            
            return false;
        }
    }


    function checkExistantEmail($email){

        if(findEmailPatient($email) || findEmailAdmin($email) ||
        findEmailDoctors($email)){

            return true;
        }

        return false;
    }

    function checkExistantPhoneNumber($phone){

        if(findPhoneNumberPatients($phone) || findPhoneNumberDoctors($phone)){
            return true;
        }

        return false;
    }


    function findEmailAdmin($email){

        $db = new Database();

        $db->query('SELECT *FROM admin WHERE email = :email');
        $db->bind(':email',$email);

        $row = $db->single();

        
        if($db->rowCounts() > 0){
            
            return true;
        }else{
            
            return false;
        }

    }
    function findEmailDoctors($email){

        $db = new Database();

        $db->query('SELECT *FROM doctors WHERE email = :email');
        $db->bind(':email',$email);

        $row = $db->single();

        
        if($db->rowCounts() > 0){
            
            return true;
        }else{
            
            return false;
        }

    }

    function findPhoneNumberPatients($phone){

        $db = new Database();

        $db->query('SELECT *FROM patients WHERE phone = :phone');
        $db->bind(':phone',$phone);

        $row = $db->single();

        
        if($db->rowCounts() > 0){
            
            return true;
        }else{
            
            return false;
        }
    }

    function findPhoneNumberDoctors($phone){

        $db = new Database();

        $db->query('SELECT *FROM doctors WHERE phone = :phone');
        $db->bind(':phone',$phone);

        $row = $db->single();

        
        if($db->rowCounts() > 0){
            
            return true;
        }else{
            
            return false;
        }
    }

    function redirect($page){

        header('Location: '.URLROOT.'/'.$page);
    }
?>