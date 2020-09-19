<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/form.css">
    <title><?php echo SITENAME?></title>
</head>
<body>
<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <?php
                if(!empty($data['success'])){
                    echo '<div class="successMessagess">';
                        echo $data['success'];
                    echo '</div>';
                }
            ?>
            <div class="card">
                <h1>UPDATE PATIENT INFORMATION</h1>

               
                <form action="<?php echo URLROOT;?>/patient/updateProfil" method="post">

                    <div class="form-control">
                        <label for="permanentAddress">New Permanent Address</label>
                        <input type="text" placeholder="Enter new Permanent Address" value="<?php echo $data['permanentAddress'];?>" 
                            id="permanentAddress" name="permanentAddress">
                        <i class="fas fa-check-circle itag"></i>
                        <i class="fa fa-exclamation-circle itag"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="email">New Email</label>
                        <input type="email" placeholder="Enter new Email" value="<?php echo $data['email'];?>" 
                            id="email" name="email">
                        <i class="fas fa-check-circle itag"></i>
                        <i class="fa fa-exclamation-circle itag"></i>
                        <span class="invalid"><?php echo $data['email_err'];?></span>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="phone_number">New Phone Number</label>
                        <input type="text" placeholder="Enter New Phone Number" value="<?php echo $data['phone_number'];?>" 
                            id="phone_number" name="phone_number">
                        <i class="fas fa-check-circle itag"></i>
                        <i class="fa fa-exclamation-circle itag"></i>
                        <span class="invalid"><?php echo $data['phone_number_err'];?></span>
                        <small>Error message</small>
                    </div>
                    
                    <div class="form-control">
                        <label for="new_password">New Password</label>
                        <input type="password" placeholder="Enter new password" value="<?php echo $data['new_password'];?>" 
                            id="new_password" name="new_password">
                            <i class="fas fa-check-circle itag"></i>
                            <i class="fa fa-exclamation-circle itag"></i>
                            <small>Error message</small>
                    </div>
                    <div class="form-control">
                        <label for="confirm_new_password">Confirm New Password</label>
                        <input type="password" placeholder="Confirm new password" value="<?php echo $data['confirm_new_password'];?>" 
                            id="confirm_new_password" name="confirm_new_password">
                        <i class="fas fa-check-circle itag"></i>
                        <i class="fa fa-exclamation-circle itag"></i>
                        <small>Error message</small>
                    </div>
                    <div class="loginButton">
                        <input type="submit" value="Submit" class="btn" onclick="return updateProfilInformation()">
                    </div>
                </form>
            </div>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>