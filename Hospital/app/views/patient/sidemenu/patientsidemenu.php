
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <section class="sidebar">
        <div class="sidebar-title">
            <img src="<?php echo URLROOT;?>/image/patient.png" alt="">
            <p>NAME:<br><?php echo $_SESSION['current_patient']->firstName;?></p>
            <p>ID: <?php echo $_SESSION['current_patient']->id;?></p>
            <p></p>
        </div>
        <a href="<?php echo URLROOT;?>/patient/dashboard">
        <img src="<?php echo URLROOT;?>/image/home.png" style="margin-right:2px;background-color:white;">
            Dashboard
        </a>
        
        <a href="<?php echo URLROOT;?>/patient/patientData">
            <img src="<?php echo URLROOT;?>/image/dash.png" alt="">
            Patient Data
        </a>
        <a href="<?php echo URLROOT;?>/patient/bookAppointment">
            <img src="<?php echo URLROOT;?>/image/app.png" alt="">
            Book Appointment
        </a>

        <a href="<?php echo URLROOT;?>/patient/AppointmentHistory">
            <img src="<?php echo URLROOT?>/image/app.png" alt="">
            Appointment
        </a>

        <a href="<?php echo URLROOT;?>/patient/updateProfil">
            <img src="<?php echo URLROOT?>/image/data.png" alt="">
            Update profile
        </a>
    </section>
</body>
</html>
