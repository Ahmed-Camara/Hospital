<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo SITENAME;?></title>
        <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">
    </head>
    <body>
        <?php require APPROOT . '/views/inc/header.php'; ?>
            <?php require 'sidemenu/header.php';?>
                <section class="sidebar-content">
                <?php
                    if(!empty($data['error'])){
                        echo '<div class="errorMessage">';
                            echo $data['error'];
                        echo '</div>';
                    }

                    else if(!empty($data['success'])){
                        echo '<div class="succesMessage">';
                            echo $data['success'];
                        echo '</div>';
                    }
                ?>
                    <form action="<?php echo URLROOT;?>/patient/bookAppointment" method="post">
                        <fieldset>
                            <legend>BOOK APPOINTMENT</legend>
                            <div class="booking">
                                <label for="doctor_specialization">Doctor Specialization</label>
                                <select name="specialisation" id="">
                                    <?php foreach($data['records'] as $appointment) : ?>
                                        <option value="<?php echo $appointment->specialisation;?>"><?php echo $appointment->specialisation;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="booking">
                                <label for="bookingDate">Date</label>
                                <input type="date" name="bookingDate">
                            </div>
                            <div class="booking">
                                    <label for="bookingTime">Time</label>
                                    <input type="time" name="bookingTime">
                                </div>
                                <div class="loginButton">
                                    <input type="submit" value="Submit" class="btn">
                                </div>
                        </fieldset>
                    </form>
                    
                </section>

            <?php require 'sidemenu/footer.php';?>
        
        <?php require APPROOT . '/views/inc/footer.php'; ?>
    </body>
</html>