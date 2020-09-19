<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
    <style>
        .invalid{
            color:red;
        }
    </style>
        <section class="sidebar-content">
            <div class="centered-form">

            <?php
                if(!empty($data['error'])){
                    echo "<div class='errorMessage'>";
                        echo $data['error'];
                    echo "</div>";
                }
                if(!empty($data['email_phone_taken'])){
                    echo "<div class='errorMessage'>";
                        echo $data['email_phone_taken'];
                    echo "</div>";
                }else if(!empty($data['success'])){
                    
                    echo "<div class='succesMessage'>";
                        echo $data['success'];
                    echo "</div>";
                }
            ?>
                
                <form action="<?php echo URLROOT;?>/admin/addDoctor" method="post">
                    <fieldset>
                        <legend>ADD DOCTOR</legend>
                            <div class="booking">
                                <label for="doctorname">Doctor name</label>
                                <input type="text" name="doctorname"
                                value="<?php echo $data['doctorname'];?>">
                            </div>

                            <div class="booking">
                                <label for="doctorspecialisation">Doctor Specialisation</label>
                                <input type="text" name="doctorspecialisation" 
                                value="<?php echo $data['doctorspecialisation'];?>">
                            </div>

                            <div class="booking">
                                <label for="email">Email</label>
                                <input type="email" name="email" 
                                value="<?php echo $data['email']?>">
                                
                            </div>
                            
                            <div class="booking">
                                <label for="address">Permanent Address</label>
                                <input type="text" name="address" 
                                value="<?php echo $data['address'];?>">
                            </div>
                            
                            <div class="booking">
                                <label for="phone_number">Doctor Phone Number</label>
                                <input type="text" name="phone_number" 
                                value="<?php echo $data['phone_number']?>">
                                
                            </div>

                            <div class="booking">
                                <label for="gender" style="display:block; margin-bottom:6px;">Gender</label>
                                <select name="gender" style="padding:5px;">
                                    <option value="">-- SELECT --</option>
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
                            </div>

                            <div class="booking">
                                <label for="dateofBirth">Date of Birth</label>
                                <input type="date" name="dateofBirth" 
                                value="<?php echo $data['dateofBirth'];?>">
                            </div>

                            <div class="booking">
                                <label for="registrationData">Registration Date</label>
                                <input type="date" name="registrationData"
                                value="<?php echo $data['registrationData'];?>">
                            </div>
                            <div class="loginButton">
                                <input type="submit" value="Submit" class="btn">
                            </div>
                    </fieldset>
                </form>
            </div>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>