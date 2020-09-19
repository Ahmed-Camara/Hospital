<?php require APPROOT . '/views/inc/header.php'; ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo URLROOT;?>/css/form.css">
    </head>
    <body>
    <section class="card">
        <h1>PATIENT REGISTRATION</h1>

        <?php
            if(!empty($data['email_err']) || !empty($data['phone_number_err'])){

                echo "<div class='errorM'>";
                    echo "Email address or Phone number is already taken. Please,chose another one";
                echo "</div>";
            }if(!empty($data['success_message'])){
                echo "<div class='successMessagess'>";
                   echo $data['success_message'];
                echo "</div>";
            }
        ?>
        <form action="<?php echo URLROOT;?>/users/registration" method="post" class="form" id="form">
            <div class="form-control">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" value="<?php echo $data['firstName'];?>"
                id="firstname">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" value="<?php echo $data['lastName'];?>"
                id="lastname">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="permanent_address">Permanent Address</label>
                <input type="text" name="permanent_address"
                value="<?php echo $data['permanent_address'];?>" id="permanentAddress">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" placeholder="Enter email"
                value="<?php echo $data['email'];?>" id="email" name="email">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" placeholder="Enter password"
                value="<?php echo $data['password'];?>" id="password" name="password">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" placeholder="Confirm password"
                value="<?php echo $data['confirm_password'];?>" id="confPassword" name="confirm_password">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" placeholder="Enter Phone Number"
                value="<?php echo $data['phone_number'];?>" id="phone_number">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="dateOfBirth">Date Of Birth</label>
                <input type="date" name="dateOfBirth"
                value="<?php echo $data['dateOfBirth'];?>" id="dateOfBirth">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="blood_group">Blood Group</label>
                <input type="text" name="blood_group"
                value="<?php echo $data['blood_group'];?>" id="blood_group">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <small>Error message</small>
            </div>

            <button type="submit" onclick="return validateForm()">Submit</button>
            
            <a href="<?php echo URLROOT;?>/users/login/patient" style="font-size:18px; margin-top:15px;">Log in</a>
        </form> 
    </section>
    </body>
    </html>
<?php require APPROOT . '/views/inc/footer.php'; ?>