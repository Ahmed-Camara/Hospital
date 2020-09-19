
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <section class="sidebar">
        <div class="sidebar-title">
            <p>Doctors</p>
            <p>ID:<?php echo $_SESSION['current_doctor']->id;?></p>
            <img src="<?php echo URLROOT;?>/image/doc.png" alt="" style="background:white;">
        </div>
        <a href="<?php echo URLROOT;?>/doctors/dashboard">
            <img src="<?php echo URLROOT;?>/image/home.png" style="margin-right:2px;background-color:white;">
            Dashboard
        </a>
        <a href="<?php echo URLROOT;?>/doctors/profil">
            <img src="<?php echo URLROOT;?>/image/profil.png">
             Profil
        </a>

        <a href="<?php echo URLROOT;?>/doctors/setPatientData">
        <img src="<?php echo URLROOT;?>/image/data.png" alt="">
            Set Patient Data
        </a>

        <a href="<?php echo URLROOT;?>/doctors/repliedAppointment">
            <img src="<?php echo URLROOT;?>/image/dash.png">
            Replied Appointments
        </a>

        <a href="<?php echo URLROOT;?>/doctors/appointment">
            <img src="<?php echo URLROOT;?>/image/app.png" alt="">
            Appointment
        </a>

    </section>
</body>
</html>
